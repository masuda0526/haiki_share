<?php

namespace App\Http\Controllers\ShopPage;

use App\Http\Controllers\Base\BaseShopPageController;
use App\Http\Controllers\Controller;
use App\Models\Employers;
use App\Models\Region;
use App\Models\Shop;
use App\Http\Controllers\Utility\AuthKubun;
use App\Http\Controllers\Utility\PathKubun;
use App\Http\Controllers\Utility\PathKunun;
use Illuminate\Http\Request;
use Session;

use function PHPUnit\Framework\isNull;

class SSignupController extends BaseShopPageController
{
    /**
     * 初期表示
     */
    function index(){
        // 表示用
        $regions = Region::all();
        $apiurl = route('api.getAreas');
        $shop = new Shop();
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
            'repass' => 'required',
            'pref' => 'required'
        ];

        $validation = $request->validate($rules);

        // パスワードの一致チェック
        $pass = $request->input('password');
        $repass = $request->input('repass');
        if(!parent::checkMatchPass($pass, $repass)){
            return back()->withInput($request->all())->withErrors(['repassNoMatch'=>'確認用パスワードが一致しません']);
        }

        // ファイルの保存処理
        $tmpFileNm = null;
        /** @var \Illuminate\Http\UploadedFile $file */
        if($request->hasFile('file')){
            $tmpFileNm = $this->saveFile($request->file('file'), PathKubun::SHOP_IMG_PATH->value);
        }

        $shop = new Shop();
        $shop->s_id = $shop->getNewKeyForParentShop();
        $shop->s_pcd = $shop->getNewShopParentCode();
        $shop->s_ccd = '000';
        $shop->s_name = $request->input('s_name');
        $shop->s_stn = $request->input('s_stn');
        $shop->s_pref = $request->input('pref');
        $shop->s_adrs = $request->input('s_adrs');
        $shop->s_status = '0';
        if(!isNull($tmpFileNm) && !empty($tmpFileNm)){
            $shop->s_img = $tmpFileNm;
        }
        $shop->created_at = now();
        $shop->save();

        $employer = new Employers();
        $employer->e_id = $shop->s_id.'000';
        $employer->s_id = $shop->s_id;
        $employer->e_cd = '000';
        $employer->email = $request->input('email');
        $employer->password = hash('sha256', $request->input('password'));
        $employer->auth = '00,01,02,03';
        $employer->e_sei = $request->input('e_seib');
        $employer->e_mei = $request->input('e_meib');
        $employer->save();


        return redirect()->route('slogin.index');

    }
}
