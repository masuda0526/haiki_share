<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Mail\MailSend;
use App\Models\Employers;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Session;

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
        $file->move(public_path($path), $tmpFileNm);
        return $tmpFileNm;
    }

    /**
     * 従業員としてログインしているか返却します。
     */
    function checkLoginForEmployers(){
        return !empty($this->checkLoginAndGetEmployer());
    }

    /**
     * 従業員としてログインしていた場合、従業員情報を返却します。
     */
    function checkLoginAndGetEmployer(){
        $employers = Session::get('employer');
        return $employers;
    }

    /**
     * メール送信処理を行います。
     */
    function sendEmail(String $address, String $viewName, array $data){
        Mail::to($address)->send(new MailSend($viewName, $data));
    }

    /**
     * ランダムパスワード生成
     */
    function createNewPass(){
        $passLength = 6;
        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $newPass = '';
        for($i = 0; $i < $passLength; $i++){
            $newPass .= $str[random_int(0, strlen($str)-1)];
        }
        return $newPass;
    }

    /**
     * パスワードリマインドメール送信
     */
    function sendPassRemindMail(String $name, String $newPass, String $address){

        $data = [
            'subject' => '新規パスワードのお知らせ',
            'name' => $name,
            'newPass' => $newPass
        ];

        $viewName = 'MailTemplate.RemindMail';

        $this->sendEmail($address, $viewName, $data);

    }
}
