<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Prefecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ApiController extends BaseController
{
    //
    function getAreas(Request $request){
        // 地方IDを取得
        $regionId = $request->get('region_id');
        // 都道府県取得
        $prefs = Prefecture::where('r_id', $regionId)->get();
        Log::debug('prefs:', [$prefs->toJson()]);

        return response()->json($prefs);
    }

    function getCategories(Request $request){
        // グループIDを取得
        /** @var int $groupId */
        $groupId = $request->get('group_id');
        Log::debug('groupId:', [$groupId]);

        /** @var \App\Models\Category[] $categories */
        $categories = Category::where('g_id', $groupId)->get();
        Log::debug('categories:', [$categories]);

        return response()->json($categories);
    }

    function getHeader(){
        $isEmployer = !empty(Session::get('employer'));
        $isUser = !empty(Session::get('user'));
        $nav = [
            [
                'name'=>'TOP',
                'url'=>''
            ],
            [
                'name'=>'商品一覧',
                'url'=>route('list')
            ],
        ];
        if($isEmployer){
            $nav[] =
            [
                'name'=>'従業員ページ',
                'url'=>route('smypage.index')
            ];
            $nav[]=[
                'name'=>'ログアウト',
                'url'=>route('slogin.logout')
            ];
        }
        if($isUser){
            $nav[]=[
                'name'=>'利用者ページ',
                'url'=>route('umypage.index')
            ];
            $nav[]=[
                'name'=>'ログアウト',
                'url'=>route('ulogin.logout')
            ];
        }
        if(!$isEmployer && !$isUser){
            $nav[]=[
                'name'=>'従業員ログイン',
                'url'=>route('slogin.index')
            ];
            $nav[]=[
                'name'=>'利用者ログイン',
                'url'=>route('ulogin.index')
            ];
        }
        return response()->json($nav);
    }
}
