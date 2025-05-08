<?php

namespace App\Http\Controllers\ShopPage;

use App\Http\Controllers\Base\BaseShopPageController;
use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class SProductRegistController extends BaseShopPageController
{
    //
    function index(){

        /** @var \App\Http\Models\Group[] $groups */
        $groups = Group::all();
        $apiUrl = route('api.getCategories');

        return view('ShopPage.SProductRegist', compact('groups', 'apiUrl'));
    }
}
