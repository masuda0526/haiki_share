<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Base\BaseController;
use Illuminate\Http\Request;

class BaseUserPageController extends BaseController
{
    //
    public function index(){
        return view('layouts.base');
    }
}
