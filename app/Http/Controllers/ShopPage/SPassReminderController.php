<?php

namespace App\Http\Controllers\ShopPage;

use App\Http\Controllers\Base\BaseShopPageController;
use App\Http\Controllers\Controller;
use App\Models\Employers;
use Illuminate\Http\Request;

class SPassReminderController extends BaseShopPageController
{
    function index(){
        return view('ShopPage.SPassReminder');
    }

    function change(Request $request){

        $rules=[
            'email' => 'required'
        ];

        $request->validate($rules);

        $employer = Employers::where('email', $request->input('email'))->first();

        if(empty($employer)){
            return back()->withInput($request->all())->withErrors(['noRegistEmail'=>'メールアドレスの登録がありません。']);
        }

        $newPass = $this->createNewPass();
        $name = $employer->getFullName();
        $address = $employer->email;

        $this->sendPassRemindMail($name, $newPass, $address);

        $employer->password = hash('sha256', $newPass);
        $employer->save();

        return redirect()->route('slogin.index');

    }
}
