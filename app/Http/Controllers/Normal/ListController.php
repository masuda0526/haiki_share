<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utility\ProductStatusKubun;
use App\Models\Group;
use App\Models\Prefecture;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class ListController extends Controller
{
    // 初期表示
    function index(Request $request){

        $query = Product::query();

        $query->whereNotIn('p_status', [ProductStatusKubun::DELETE_PRODUCT->value, ProductStatusKubun::CANCEL_SALE->value]);

        // 検索ワードがあれば条件追加
        if($request->filled('keyword')){
            $keyword = $request->input('keyword');
            $query->where(function($q) use ($keyword){
                $q->where('p_name', 'like', "%{$keyword}%");
            });
        }

        // カテゴリを条件について
        if($request->filled('category')){
            $category = $request->input('category');
            $query->whereIn('c_id', $category);
        }

        // 最小価格について
        if($request->filled('minPrice')){
            $minPrice = $request->input('minPrice');
            $query->where('dis_price', '>=', $minPrice);
        }

        // 最大価格について
        if($request->filled('maxPrice')){
            $maxPrice = $request->input('maxPrice');
            $query->where('dis_price', '<=', $maxPrice);
        }

        // 都道府県
        if($request->filled('pref') && !empty($request->input('pref'))){
            $pref = $request->input('pref');
            $shopList = $this->getShopListbyPrefId($pref);
            $query->whereIn('s_id', $shopList);
        }

        // 販売中か
        if($request->filled('isSale')){
            $query->where('p_status', ProductStatusKubun::CURRENT_UNDER_SALE->value);
        }

        // 賞味期限ないか
        if($request->filled('inExDt')){
            $query->where('ex_dt', '>=', now());
        }

        $query->orderBy('created_at', 'desc');

        $isSaleVal = ProductStatusKubun::CURRENT_UNDER_SALE->value;
        $products = $query->paginate(12)->appends($request->query());
        $groups = Group::all();
        $prefs = Prefecture::all();
        return view('Normal.list', compact('products', 'groups', 'prefs', 'isSaleVal'));
    }

    /**
     * 都道府県に該当するショップIDのリストを返却
     */
    function getShopListbyPrefId(String $prefId){

        $shopList = Shop::select('s_id')->where('s_pref', $prefId)->pluck('s_id');
        return $shopList;

    }
}
