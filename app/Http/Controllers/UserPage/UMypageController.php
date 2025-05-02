<?php

namespace App\Http\Controllers\UserPage;

use App\Http\Controllers\Base\BaseUserPageController;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UMypageController extends BaseUserPageController
{
    //
    function index(){
        // $user = User::where('u_id', 'U0000')->first();
        $user = Session::get('user');
        Log::debug('umypage.index', [$user]);
        $products = Product::where('u_id', $user->u_id)->get();
        Log::debug("value:", [$products]);
        return view('UserPage.UMypage', compact('user','products'));
    }
}
