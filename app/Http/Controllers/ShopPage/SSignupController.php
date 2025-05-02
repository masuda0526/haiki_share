<?php

namespace App\Http\Controllers\ShopPage;

use App\Http\Controllers\Base\BaseShopPageController;
use App\Http\Controllers\Controller;
use App\Models\Employers;
use App\Models\Region;
use App\Models\Shop;
use Illuminate\Http\Request;

class SSignupController extends BaseShopPageController
{
    /**
     * 初期表示
     */
    function index(){
        $regions = Region::all();
        $apiurl = route('api.getAreas');
        $shop = new Shop();
        dd($shop->getNewKey());
        return view('ShopPage.SSignup', compact('regions', 'apiurl'));
    }

    /**
     * サインアップ
     */
    function signup(Request $request){

        $rules = [
            'file' => 'file|mimes:jpg,jpeg,png|max:2048',
            's_name' => 'required|max:50|',
            's_stn' => 'required|max:50',
            's_adrs' => 'required|max:255',
            'e_seib' => 'required|max:10',
            'e_meib' => 'required|max:10',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:4',
            'repass' => 'required'
        ];

        $validation = $request->validate($rules);

        // パスワードの一致チェック
        $pass = $request->input('password');
        $repass = $request->input('repass');
        if(!parent::checkMatchPass($pass, $repass)){
            return back()->withInput($request->all())->withErrors(['repassNoMatch'=>'確認用パスワードが一致しません']);
        }

        // ファイルの保存処理
        /** @var \Illuminate\Http\UploadedFile $file */
        $file = $request('file');
        $tmpFileNm = uniqid().'.'.$file->extension();
        $file->storeAs('public/img', $tmpFileNm);

        $shop = new Shop();
        dd($shop->getNewKey());

        $enployer = new Employers();


        return redirect()->route('smypage.index');

    }
}
