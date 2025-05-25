<?php

namespace App\Http\Controllers\UserPage;

use App\Http\Controllers\Base\BaseUserPageController;
use App\Http\Controllers\Controller;
use App\Models\Prefecture;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UMypageController extends BaseUserPageController
{
    //
    function index(){
        $user = Session::get('user');
        if(empty($user)){
            return redirect()->route('ulogin.index');
        }
        $products = Product::where('u_id', $user->u_id)->get();

        $prefs = Prefecture::all();
        return view('UserPage.UMypage', compact('user','products', 'prefs'));
    }
}
