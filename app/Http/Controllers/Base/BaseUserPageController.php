<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Base\BaseController;
use App\Models\User;
use Illuminate\Http\Request;

class BaseUserPageController extends BaseController
{
    //
    public function index(){
        return view('layouts.base');
    }

    /**
     *  メールアドレス重複チェック
     *
     *
     */
    public function checkDupEmail(String $email){
        $count = User::where('email', $email)->count();
        return $count == 0;
    }
}
