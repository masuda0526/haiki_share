<?php

namespace App\Http\Controllers\ShopPage;

use App\Http\Controllers\Base\BaseShopPageController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utility\AuthKubun;
use App\Http\Controllers\Utility\ProductStatusKubun;
use App\Models\Employers;
use App\Models\Prefecture;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SProductListController extends BaseShopPageController
{
    function nowsale(){

        $employer = Session::get('employer');

        // チェック
        $response = $this->check($employer);
        if(!empty($response)){
            return $response;
        }

        $products = Product::whereSId($employer->s_id)
                    ->whereIn('p_status', [ProductStatusKubun::CURRENT_UNDER_SALE->value, ProductStatusKubun::CANCEL_SALE->value, ProductStatusKubun::ALREADY_PARCHASED->value])
                    ->orderBy('updated_at', 'desc')->get();

        $title = '商品一覧';
        $subtitle = '出品した商品一覧';
        $prefs = Prefecture::all();

        return view('ShopPage.SProductList', compact('title','subtitle', 'products', 'prefs'));

    }

    function sold(){

        $employer = Session::get('employer');

        // チェック
        $response = $this->check($employer);
        if(!empty($response)){
            return $response;
        }

        $products = Product::whereSId($employer->s_id)
                    ->wherePStatus(ProductStatusKubun::ALREADY_PARCHASED)
                    ->orderBy('updated_at', 'desc')->get();

        $title='商品一覧';
        $subtitle = '購入された商品一覧';
        $prefs = Prefecture::all();

        return view('ShopPage.SProductList', compact('title', 'subtitle', 'products', 'prefs'));

    }

    function check(Employers $employer){

        // 従業員情報があるか
        if(empty($employer)){
            return redirect()->route('smypage.index');
        }
        // 権限があるか
        if(!$employer->hasAuth(AuthKubun::BROWSE->value)){
            return redirect()->route('smypage.index');
        }
        return null;
    }
}
