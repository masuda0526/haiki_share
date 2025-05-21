<?php

namespace App\Http\Controllers\UserPage;

use App\Http\Controllers\Base\BaseUserPageController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UPassReminderController extends BaseUserPageController
{
    function index(){
        return view('UserPage.UPassReminder');
    }

    function change(Request $request){

        $rules=[
            'email' => 'required'
        ];

        $request->validate($rules);

        $user = User::where('email', $request->input('email'))->first();

        if(empty($user)){
            return back()->withInput($request->all())->withErrors(['noRegistEmail'=>'メールアドレスの登録がありません。']);
        }

        $newPass = $this->createNewPass();
        $name = $user->getFullName();
        $address = $user->email;

        $this->sendPassRemindMail($name, $newPass, $address);

        $user->password = hash('sha256', $newPass);
        $user->save();

        return redirect()->route('ulogin.index');
    }
}
