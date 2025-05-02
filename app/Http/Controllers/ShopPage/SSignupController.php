<?php

namespace App\Http\Controllers\ShopPage;

use App\Http\Controllers\Base\BaseShopPageController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SSignupController extends BaseShopPageController
{
    //
    function index(){
        return view('ShopPage.SSignup');
    }
}
