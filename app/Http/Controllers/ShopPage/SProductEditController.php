<?php

namespace App\Http\Controllers\ShopPage;

use App\Http\Controllers\Base\BaseShopPageController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utility\AuthKubun;
use App\Http\Controllers\Utility\PathKubun;
use App\Http\Controllers\Utility\ProductStatusKubun;
use App\Models\Employers;
use App\Models\Group;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class SProductEditController extends BaseShopPageController
{
    function index(Request $request){

        // 商品情報取得
        $productId = $request->route('productId');
        $product = Product::where("p_id", $productId)->first();

        // 従業員情報取得
        $employer = Session::get('employer');

        // 権限チェック
        $this->check($product, $employer);

        $groups = Group::all();
        $apiUrl = route('api.getCategories');
        $productStatus = ProductStatusKubun::valueToLabel();

        return view('ShopPage.SProductEdit', compact('product', 'groups', 'apiUrl', 'productStatus'));
    }

    function submit(Request $request){
        $submit = $request->input('submit');

        if($submit == '更新する'){
            return $this->update($request);
        }elseif($submit == '削除する'){
            return $this->delete($request);
        }

        return redirect()->route('smypage.index');

    }

    function update(Request $request){

        $productId = $request->route('productId');
        $product = Product::where("p_id", $productId)->first();

        $employer = Session::get('employer');

        $this->check($product, $employer);

        $rules = [
            'file' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric|integer',
            'dis_price' => 'required|numeric|integer',
            'p_name' => 'required|string|max:50',
            'ex_dt' => 'required|date|after:today',
            'p_comment' => 'required|string|max:255',
            'p_status' => 'required'
        ];

        $request->validate($rules);

        $input = $request->all();

        // 写真のチェック
        if($request->hasFile('file')){
            // ファイル情報を更新
            $file = $request->file('file');
            $tmpFileNm = $this->saveFile($file, PathKubun::PRODUCT_IMG_PATH->value);
            // 旧ファイルの削除
            $oldImg = public_path('img/product/'.$product->p_img);
            if(File::exists($oldImg)){
                File::delete($oldImg);
            }
            $product->p_img = $tmpFileNm;
        }

        $product->c_id = $input['category'];
        $product->p_name = $input['p_name'];
        $product->price = $input['price'];
        $product->dis_price = $input['dis_price'];
        $product->ex_dt = $input['ex_dt'];
        $product->p_comment = $input['p_comment'];
        $product->p_status = $input['p_status'];
        $product->updated_at = now();
        $product->save();

        return redirect()->route('smypage.index');

    }

    function delete(Request $request){

        $productId = $request->route('productId');
        $product = Product::where("p_id", $productId)->first();

        $employer = Session::get('employer');

        $this->check($product, $employer);

        $product->p_status = ProductStatusKubun::DELETE_PRODUCT->value;
        $product->updated_at = now();
        $product->save();

        return redirect()->route('smypage.index');

    }

    function check(Product $product, Employers $employer, ){

        // 従業員情報がなければ、商品一覧へ
        if(empty($employer)){
            return redirect()->route('list');
        }

        // 商品情報がなければ、マイページへ
        if(empty($product)){
            return redirect()->route('list');
        }

        // 従業員が店舗の従業員でなければ、マイページへ
        if($employer->s_id != $product->s_id){
            return redirect()->route('list');
        }

        // 商品編集権限がなければ、マイページへ
        if(!$employer->hasAuth(AuthKubun::EDIT_PRODUCT->value)){
            return redirect()->route('smypage.index');
        }

    }
}
