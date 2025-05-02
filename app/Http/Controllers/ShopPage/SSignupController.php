<?php

namespace App\Http\Controllers\ShopPage;

use App\Http\Controllers\Base\BaseShopPageController;
use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class SSignupController extends BaseShopPageController
{
    //
    function index(){
        $regions = Region::all();
        $apiurl = route('api.getAreas');
        return view('ShopPage.SSignup', compact('regions', 'apiurl'));
    }
}
