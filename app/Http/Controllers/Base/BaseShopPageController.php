<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Base\BaseController;
use App\Models\Employers;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class BaseShopPageController extends BaseController
{

    // 権限チェックメソッド
    function checkPageAuthAndRedirect(Employers $employer, String $authCode){

        if(!$this->checkPageAuth($employer, $authCode)){
            // 権限がなければマイページへリダイレクト
            return redirect(route('smypage.index'));
        }

    }

    // 権限チェックメソッド
    function checkPageAuth(Employers $employer, String $authCode){
        $auths = explode(',', $employer->auth);
        return in_array($authCode, $auths);
    }

}
