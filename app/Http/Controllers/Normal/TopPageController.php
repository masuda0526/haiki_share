<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopPageController extends BaseController
{
    //
    function index(){
        return view('Normal.TopPage');
    }
}
