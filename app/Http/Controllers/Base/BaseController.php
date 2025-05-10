<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

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

    /**
     * ファイルを保存します。成功後はユニークなファイル名を返却します。
     * @param UploadedFile 保存するファイル
     * @param String 保存先パス
     */
    function saveFile(UploadedFile $file, String $path){
        // ファイルの保存処理
        $tmpFileNm = uniqid().'.'.$file->extension();
        $file->move(public_path('img'), $tmpFileNm);
        return $tmpFileNm;
    }
}
