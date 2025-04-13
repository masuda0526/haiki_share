<?php

namespace App\Http\Controllers\UserPage;

use App\Http\Controllers\Base\BaseUserPageController;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class USignupController extends BaseUserPageController
{
    //
    function index(){
        $regions = Region::all();
        $apiurl = route('api.getAreas');
        Log::debug('apiUrl:', [$apiurl]);
        return view('UserPage.USignup', compact('regions', 'apiurl'));
    }

    function signup(Request $request){
        $input = $request->all();
        Log::debug('利用者登録（登録処理）', $input);

        $rules = [
            'u_sei' => ['required', 'max:10'],
            'u_mei' => ['required', 'max:10'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:4'],
            'repass' => ['required'],
            'pref' => ['required'],
            'address' => ['required', 'max:255'],
        ];
        $validator = Validator::make($input, $rules);
        if($validator->fails()){
            return back()->withInput($input)->withErrors($validator);
        }

        // メールアドレス重複チェック
        if(!parent::checkDupEmail($input['email'])){
            return back()->withInput($request->all())->withErrors(['duplicate_email'=>'このメールアドレスはすでに登録されています。']);
        }

        // パスワードチェック
        if(!parent::checkMatchPass($input['password'], $input['repass'])){
            return back()->withInput($request->all())->withError(['repassNoMatch'=>'確認用パスワードが一致しません']);
        }

        $user = new User();
        $user->u_id = $user->getNewKey();
        $user->u_sei = $input['u_sei'];
        $user->u_mei = $input['u_mei'];
        $user->email = $input['email'];
        $user->password = hash('sha256', $input['password']);
        $user->u_pref = $input['pref'];
        $user->u_adrs = $input['address'];

        Log::debug('利用者登録開始：', [$user]);

        $user->save();

        return redirect()->route('ulogin.login')->with('success', '登録完了しました。');
    }
}
