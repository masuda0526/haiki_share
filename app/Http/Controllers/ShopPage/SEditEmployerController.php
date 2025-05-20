<?php

namespace App\Http\Controllers\ShopPage;

use App\Http\Controllers\Base\BaseShopPageController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utility\AuthKubun;
use App\Models\Employers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class SEditEmployerController extends BaseShopPageController
{

    function index(Request $request){

        $eId = $request->route('employerId');
        $target = Employers::where('e_id', $eId)->first();
        if(empty($target)){
            return redirect()->route('smypage.index');
        }

        $employer = Session::get('employer');

        if(!$this->check($eId, $employer)){
            return redirect()->route('smypage.index');
        };

        $auths = AuthKubun::toAuthArray();
        $authArray = $target->toArrayOfAuth();

        return view('ShopPage.SEditEmployer', compact('target', 'auths', 'authArray'));
    }

    function edit(Request $request){

        $eId = $request->input('employerId');
        $target = Employers::where('e_id', $eId)->first();
        if(empty($target)){
            return redirect()->route('smypage.index');
        }

        $employer = Session::get('employer');

        $this->check($eId, $employer, $target);

        $rule = [
            'e_sei' => 'required|max:10',
            'e_mei' => 'required|max:10',
            'email' => ['required', 'max:255', 'email', Rule::unique('employers')->ignore($target->e_id, 'e_id')],
        ];

        $request->validate($rule);
        $input = $request->all();

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

        $target->e_sei = $input['e_sei'];
        $target->e_mei = $input['e_mei'];
        $target->email = $input['email'];
        $target->auth = $target->toStringForRegistDB($input['auth']);
        if(!empty($newPass))$target->password = hash('sha256', $newPass);
        $target->updated_at = now();
        $target->save();

        return redirect()->route('smypage.index');


    }

    /**
     * 初期チェック
     */
    function check(?String $eId, ?Employers $employer){

        if(empty($eId)){
            return false;
        }

        if(empty($employer)){
            return false;
        }

        if(!$employer->hasAuth(AuthKubun::EDIT_EMPLOYER->value)){
            return false;
        }

        return true;
    }
}
