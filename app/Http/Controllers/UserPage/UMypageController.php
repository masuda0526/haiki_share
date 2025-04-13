<?php

namespace App\Http\Controllers\UserPage;

use App\Http\Controllers\Base\BaseUserPageController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UMypageController extends BaseUserPageController
{
    //
    function index(){
        return view('UserPage.UMypage');
    }
}
