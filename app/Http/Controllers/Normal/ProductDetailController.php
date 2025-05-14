<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utility\ProductStatusKubun;
use App\Models\Employers;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class ProductDetailController extends BaseController
{
    //
    function index(Request $request){

        // 商品情報取得
        $productId = $request->route('productId');
        $product = Product::where('p_id', $productId)->first();
        if(empty($product)){
            return redirect()->route('list');
        }
        $shop = Shop::find($product->s_id);

        // 編集ボタンと購入ボタンの表示・非表示
        $isShowEditBtn = false;
        $isShowBuyBtn = false;
        $employer = Session::get('employer');
        if(!empty($employer)){
            if($employer->s_id == $product->s_id && $product->p_status != ProductStatusKubun::ALREADY_PARCHASED->value){
                $isShowEditBtn = true;
            }
        }
        if($product->isAbleBuy()){
            $isShowBuyBtn = true;
            if(!empty($employer)){
                if($employer->s_id == $product->s_id){
                    $isShowBuyBtn = false;
                }
            }
        }

        return view('Normal.PDetail', compact('product', 'shop','isShowEditBtn', 'isShowBuyBtn'));
    }

    function buy(Request $request){
        $productId = $request->route('productId');
        $product = Product::find($productId);
        if(empty($product)){
            return redirect()->route('list');
        }

        $user = Session::get('user');
        if(empty($user)){
            return redirect()->route('ulogin.index');
        }

        if(!$product->isAbleBuy()){
            return redirect()->route('list');
        }

        // DB更新処理
        $product->u_id = $user->u_id;
        $product->p_status = ProductStatusKubun::ALREADY_PARCHASED->value;
        $product->updated_at = now();
        $product->save();

        $employer = Employers::find($product->e_id)->first();
        $shop = Shop::find($product->s_id)->first();

        // メール送信処理
        if(!$employer->isBoss()){
            $this->sendBuyMailForBoss($product, $shop, $employer, $user);
        }
        $this->sendBuyMailForEmployer($product, $shop, $employer, $user);
        $this->sendBuyMailForUser($product, $shop, $user);

        return redirect()->route('list');
    }

    /**
     * 店長へメール送信を行います。
     */
    function sendBuyMailForBoss (Product $product, Shop $shop, Employers $employer, User $user){
        $data = [
            'subject'=>'商品が購入されました',
            'product' => $product,
            'shop' => $shop,
            'employer' => $employer,
            'user' => $user
        ];

        $address = $shop->getBossEmail();
        $viewName = 'MailTemplate.Shop.BuyMessageForBoss';

        $this->sendEmail($address, $viewName, $data);
    }

    function sendBuyMailForEmployer(Product $product, Shop $shop, Employers $employer, User $user){
        $data = [
            'subject'=>'商品が購入されました',
            'product' => $product,
            'shop' => $shop,
            'employer' => $employer,
            'user' => $user
        ];

        $address = $employer->email;
        $viewName = 'MailTemplate.Shop.BuyMessageForEmployer';

        $this->sendEmail($address, $viewName, $data);
    }

    function sendBuyMailForUser(Product $product, Shop $shop, User $user){
        $data = [
            'subject'=>'商品の購入が完了しました',
            'product' => $product,
            'shop' => $shop,
            'user' => $user
        ];

        $address = $user->email;
        $viewName = 'MailTemplate.User.BuyMessageForUser';

        $this->sendEmail($address, $viewName, $data);
    }


}
