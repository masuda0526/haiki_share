<?php

namespace App\Http\Controllers\ShopPage;

use App\Http\Controllers\Base\BaseShopPageController;
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
        $products = Product::where('s_id', $employer->s_id)->where('p_status', '0')->limit(5)->get();

        // 購入された商品情報を取得
        $parchaseProducts = Product::where('s_id', $employer->s_id)->where('p_status', '1')->limit(5)->get();

        // スタッフ情報を取得
        $staff = Employers::where('s_id', $employer->s_id)->get();

        return view('ShopPage.SMypage', compact('employer', 'shop', 'products', 'parchaseProducts', 'staff'));
    }
}
