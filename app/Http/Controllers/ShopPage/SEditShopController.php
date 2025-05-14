<?php

namespace App\Http\Controllers\ShopPage;

use App\Http\Controllers\Base\BaseShopPageController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utility\AuthKubun;
use App\Models\Region;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Session;
use Storage;

class SEditShopController extends BaseShopPageController
{
    //
    function index(){
        // セッションから従業員情報を取得
        /** @var App\Models\Employer $employer */
        $employer = Session::get('employer');

        // 権限があるかどうか確認
        if(!$employer->hasAuth(AuthKubun::EDIT_SHOP->value)){
            return redirect()->route('smypage.index');
        }

        // 店舗情報を取得
        $shop = Shop::where('s_id', $employer->s_id)->first();
        // dd($shop);

        // 表示用
        $regions = Region::all();
        $apiurl = route('api.getAreas');
        return view('ShopPage.SEditShop', compact('regions', 'apiurl', 'shop'));
    }

    function update(Request $request){

        // セッションから従業員情報を取得
        /** @var App\Models\Employer $employer */
        $employer = Session::get('employer');

        if($employer->hasAuth(AuthKubun::EDIT_PRODUCT->value)){
            return redirect()->route('smypage.index');
        }

        $rules = [
            'file' => 'file|mimes:jpg,jpeg,png|max:2048',
            's_name' => 'required|max:50|',
            's_stn' => 'required|max:50',
            's_adrs' => 'required|max:255',
            'pref' => 'required'
        ];

        // バリデーション
        $validation = $request->validate($rules);

        $input = $request->all();
        $shop = Shop::where('s_id', $employer->s_id)->first();

        // 写真の登録
        if($request->hasFile('file')){
            // ファイル情報を更新
            $file = $request->file('file');
            $tmpFileNm = uniqid().'.'.$file->extension();
            $file->move(public_path('img'), $tmpFileNm);
            // 旧ファイルの削除
            $oldImg = public_path('img/shop'.$shop->s_img);
            if(File::exists($oldImg)){
                File::delete($oldImg);
            }
            $shop->s_img = $tmpFileNm;
        }

        $shop->s_name = $input['s_name'];
        $shop->s_stn = $input['s_stn'];
        $shop->s_pref = $input['pref'];
        $shop->s_adrs = $input['s_adrs'];
        $shop->update();

        return redirect()->route('smypage.index');

    }
}
