<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Group;
use App\Models\Product;
use Illuminate\Http\Request;

class ListController extends Controller
{
    // 初期表示
    function index(Request $request){

        $query = Product::query();

        // 検索ワードがあれば条件追加
        if($request->filled('keyword')){
            $keyword = $request->input('keyword');
            $query->where(function($q) use ($keyword){
                $q->where('p_name', 'like', "%{$keyword}");
            });
        }

        // カテゴリを条件について
        if($request->filled('category')){
            $category = $request->input('category');
            $query->whereIn('c_id', $request->input('category'));
        }

        $products = $query->paginate(12)->appends($request->query());
        $groups = Group::all();
        return view('Normal.list', compact('products', 'groups'));
    }
}
