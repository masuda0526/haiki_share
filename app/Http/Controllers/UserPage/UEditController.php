<?php

namespace App\Http\Controllers\UserPage;

use App\Http\Controllers\Base\BaseUserPageController;
use App\Models\Prefecture;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UEditController extends BaseUserPageController
{
    // 初期表示
    function index(){
        $user = Session::get('user');
        Log::debug('DEBUG:', [$user->u_pref]);
        $r_id = Prefecture::where('pref_id', $user->u_pref)->first()->r_id;
        Log::debug('DEBUG:', [$r_id]);
        $regions = Region::all();
        $apiurl = route('api.getAreas');
        return view('UserPage.UEdit', compact('user', 'regions', 'apiurl', 'r_id'));
    }

    // 編集処理
    function update(Request $request){
        $input = $request->all();
        $rules = [
            'u_sei' => ['required', 'max:10'],
            'u_mei' => ['required', 'max:10'],
            'email' => ['required', 'email', 'max:255'],
            'pref' => ['required'],
            'address' => ['required', 'max:255'],
        ];

        $validator = Validator::make($input, $rules);
        if($validator->fails()){
            return back()->withInput($input)->withErrors($validator);
        }

        $prevUser = Session::get('user');
        // メールアドレス重複チェック
        if(!parent::checkDupEmail($input['email']) && $input['email'] != $prevUser->email){
            return back()->withInput($request->all())->withErrors(['duplicate_email'=>'このメールアドレスはすでに登録されています。']);
        }
        Log::debug('uedit.update', [$prevUser]);
        $user = User::find($prevUser->u_id);
        $user->u_sei = $input['u_sei'];
        $user->u_mei = $input['u_mei'];
        $user->email = $input['email'];
        $user->u_pref = $input['pref'];
        $user->u_adrs = $input['address'];
        $user->save();

        Session::put('user', $user);

        return redirect()->route('umypage.index');
    }
}
