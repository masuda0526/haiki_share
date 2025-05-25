<?php

namespace App\Http\Controllers\UserPage;

use App\Http\Controllers\Base\BaseUserPageController;
use App\Models\Prefecture;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UEditController extends BaseUserPageController
{
    // 初期表示
    function index(){
        $user = Session::get('user');
        if(empty($user)){
            return redirect()->route('ulogin.index');
        }
        $r_id = Prefecture::where('pref_id', $user->u_pref)->first()->r_id;
        $regions = Region::all();
        $apiurl = route('api.getAreas');
        return view('UserPage.UEdit', compact('user', 'regions', 'apiurl', 'r_id'));
    }

    // 編集処理
    function update(Request $request){
        $input = $request->all();
        $rules = [
            'u_sei' => ['required', 'max:10'],
            'u_mei' => ['required', 'max:10'],
            'email' => ['required', 'email', 'max:255'],
            'pref' => ['required'],
            'address' => ['required', 'max:255'],
        ];

        $validator = Validator::make($input, $rules);
        if($validator->fails()){
            return back()->withInput($input)->withErrors($validator);
        }

        $prevUser = Session::get('user');
        if(empty($prevUser)){
            return redirect()->route('ulogin.index');
        }
        // メールアドレス重複チェック
        if(!parent::checkDupEmail($input['email']) && $input['email'] != $prevUser->email){
            return back()->withInput($request->all())->withErrors(['duplicate_email'=>'このメールアドレスはすでに登録されています。']);
        }

        $nowPass = $input['nowpass'];
        $newPass = $input['newpass'];
        $rePass = $input['repass'];

        // 新しいパスワードまたは現在のパスワードに入力があればバリデーション追加
        if(!empty($nowPass) || !empty($newPass) || !empty($rePass)){
            // パスワードの入力確認
            if(empty($nowPass) || empty($newPass) || empty($rePass)){
                return back()->withInput($input)->withErrors(['noRequiredPass' => 'パスワードを変更する場合は、お使いのパスワード、新しいパスワード、確認用のパスワードを入力してください。']);
            }
            // ４文字以上か
            if(mb_strlen($newPass) < 3){
                return back()->withInput($input)->withErrors(['minLengthPass' => '新しいパスワードは４文字以上で入力してください。']);
            }
            // 一致確認
            if(!$this->checkMatchPass($newPass, $rePass)){
                return back()->withInput($input)->withErrors(['noMatchPass' => 'パスワードが一致しません。']);
            }
        }

        $user = User::find($prevUser->u_id);
        $user->u_sei = $input['u_sei'];
        $user->u_mei = $input['u_mei'];
        $user->email = $input['email'];
        $user->u_pref = $input['pref'];
        $user->u_adrs = $input['address'];
        if(!empty($newPass))$user->password = hash('sha256', $newPass);
        $user->save();

        Session::put('user', $user);

        return redirect()->route('umypage.index');
    }
}
