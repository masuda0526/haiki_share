<?php

namespace App\Http\Controllers\ShopPage;

use App\Http\Controllers\Base\BaseShopPageController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utility\AuthKubun;
use App\Http\Controllers\Utility\PathKubun;
use App\Http\Controllers\Utility\ProductStatusKubun;
use App\Models\Group;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Session;

use function PHPUnit\Framework\isNull;

class SProductRegistController extends BaseShopPageController
{
    //
    function index(){

        /** @var \App\Http\Models\Group[] $groups */
        $groups = Group::all();
        $apiUrl = route('api.getCategories');

        return view('ShopPage.SProductRegist', compact('groups', 'apiUrl'));
    }

    function regist(Request $request){
        // 権限チェック
        $employer = Session::get('employer');
        $this->checkPageAuth($employer, AuthKubun::BROWSE->value);

        $input = $request->all();

        $rules = [
            'file' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric|integer',
            'dis_price' => 'required|numeric|integer',
            'p_name' => 'required|string|max:50',
            'ex_dt' => 'required|date|after:today',
            'p_comment' => 'required|string|max:255'
        ];

        $validation = $request->validate($rules);

        $product = new Product();
        $product->p_id = $product->getNewKey();
        $product->s_id = $employer->s_id;
        $product->e_id = $employer->e_id;
        if(!empty($input['category'])){
            $product->c_id = $input['category'];
        }
        $product->p_name = $input['p_name'];
        if($request->hasFile('file')){
            $product->p_img = $this->saveFile($request->file('file'), PathKubun::PRODUCT_IMG_PATH->value);
        }
        $product->price = $input['price'];
        $product->dis_price = $input['dis_price'];
        $product->ex_dt = $input['ex_dt'];
        $product->p_comment = $input['p_comment'];
        $product->p_status = ProductStatusKubun::CURRENT_UNDER_SALE->value;
        $product->created_at = now();
        $product->save();

        return redirect()->route('smypage.index');

    }
}
