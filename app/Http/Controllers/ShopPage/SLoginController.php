<?php

namespace App\Http\Controllers\ShopPage;

use App\Http\Controllers\Base\BaseShopPageController;
use App\Models\Employers;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SLoginController extends BaseShopPageController{

    // 初期表示
    public function index(){
        return view('ShopPage.SLogin');
    }

    // ログイン
    public function login(Request $request){

        // バリデーションルール
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];

        // バリデーション実行
        $this->validate($request, $rules);

        // 従業員情報取得
        $employer = Employers::where('email', $request->input('email'))->first();
        if(!$employer){
            return back()->withInput($request->all())->withErrors(['nomatchpass'=>'メールアドレスまたはパスワードが一致しません']);
        }

        // パスワードチェック
        $pass = $employer->password;
        $inputPass = hash('sha256',$request->input('password'));
        if($pass != $inputPass){
            return back()->withInput($request->all())->withErrors(['nomatchpass'=>'メールアドレスまたはパスワードが一致しません']);
        }

        // セッションへ雇用者情報を格納
        Session::put('employer', $employer);

        return redirect()->route('smypage.index');
    }

}
