<?php

namespace App\Http\Controllers\ShopPage;

use App\Http\Controllers\Base\BaseShopPageController;
use App\Http\Controllers\Utility\AuthKubun;
use App\Http\Controllers\Utility\ProductStatusKubun;
use App\Models\Employers;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Support\Facades\Session;

class SMypageController extends BaseShopPageController{

    // 初期表示
    public function index(){

        $employer = Session::get('employer');

        // 所属する店舗情報を取得
        $shop = Shop::where('s_id', $employer->s_id)->first();

        // 出品した商品情報を取得
        $products = Product::where('s_id', $employer->s_id)->whereIn('p_status', [ProductStatusKubun::CURRENT_UNDER_SALE->value, ProductStatusKubun::CANCEL_SALE->value, ProductStatusKubun::ALREADY_PARCHASED->value])->limit(5)->get();

        // 購入された商品情報を取得
        $parchaseProducts = Product::where('s_id', $employer->s_id)->where('p_status', '1')->limit(5)->get();

        // スタッフ情報を取得
        $staff = Employers::where('s_id', $employer->s_id)->get();

        $isEditEmployer = $employer->hasAuth(AuthKubun::EDIT_EMPLOYER->value);
        $isEditProduct = $employer->hasAuth(AuthKubun::EDIT_PRODUCT->value);
        $isEditShop = $employer->hasAuth(AuthKubun::EDIT_SHOP->value);


        return view('ShopPage.SMypage',
            compact(
                'employer',
                'shop',
                'products',
                'parchaseProducts',
                'staff',
                'isEditEmployer',
                'isEditProduct',
                'isEditShop'
            )
        );
    }
}
