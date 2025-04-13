<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    //
    private function returnViewPrevPage(){
        session('prevPage');
    }

    /**
     * パスワードが一致しているかチェックする
     * @param String $pass1 パスワード
     * @param String $pass2 パスワード確認用
     * @return boolean 結果（一致：true,　不一致:false)
     */
    public function checkMatchPass(String $pass1, String $pass2){
        return $pass1 == $pass2;
    }
}
