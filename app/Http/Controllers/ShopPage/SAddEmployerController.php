<?php

namespace App\Http\Controllers\ShopPage;

use App\Http\Controllers\Base\BaseShopPageController;
use App\Http\Controllers\Utility\AuthKubun;
use App\Models\Employers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SAddEmployerController extends BaseShopPageController
{
    function index(){

        $employer = Session::get('employer');

        $this->check($employer);

        $auths = AuthKubun::toAuthArray();

        return view('ShopPage.SAddEmployer', compact('auths'));
    }

    function add(Request $request){
        $employer = Session::get('employer');

        $this->check($employer);

        $rules = [
            'e_sei' => 'required|max:10',
            'e_mei' => 'required|max:10',
            'email' => 'required|email|max:255|unique:employers,email',
            'password' => 'required|min:4',
            'repass' => 'required',
        ];

        $request->validate($rules);

        $input = $request->all();

        $pass = $input['password'];
        $repass = $input['repass'];
        if(!$this->checkMatchPass($pass, $repass)){
            return back()->withInput($input)->withErrors(['repassNoMatch'=>'確認用パスワードが一致しません']);
        }
        $newEmployer = new Employers();
        $newEmployer->e_cd = $newEmployer->getNewEmployerCd($employer->s_id);
        $newEmployer->s_id = $employer->s_id;
        $newEmployer->e_id = $employer->s_id.$newEmployer->e_cd;
        $newEmployer->email = $input['email'];
        $newEmployer->password = hash('sha256', $input['password']);
        $newEmployer->e_sei = $input['e_sei'];
        $newEmployer->e_mei = $input['e_mei'];
        $newEmployer->auth = $newEmployer->toStringForRegistDB($input['auth']);
        $newEmployer->created_at = now();
        $newEmployer->updated_at = now();
        $newEmployer->save();

        return redirect()->route('smypage.index');
    }

    function check(Employers $employer){

        // セッションに従業員情報がなければエラー
        if(empty($employer)){
            return redirect()->route('slogin.index');
        }

        // 従業員の権限チェック
        if($employer->hasAuth(AuthKubun::EDIT_EMPLOYER->value)){
            return redirect()->route('smypage.index');
        }

    }
}
