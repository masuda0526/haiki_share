<?php

namespace App\Http\Controllers\UserPage;

use App\Http\Controllers\Base\BaseUserPageController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ULoginController extends BaseUserPageController
{
    //
    function index(){
        return view('UserPage.ULogin');
    }

    function login(Request $request){

        $email = $request->get('email');
        $pass = $request->get('password');
        $rules = [
            'email' => ['required', 'email'],
            'password' => ['required']
        ];
        $this->validate($request, $rules);
        $user = DB::table('users')->where('email', $email)->first();
        Log::debug('debug======================',['user'=>$user]);
        $hash = hash('sha256', $pass);
        if($hash != $user->password){
            return back()->withInput($request->all())->withErrors(['nomatchpass'=>'メールアドレスまたはパスワードが一致しません']);
        }
        return view('home');
    }
}
