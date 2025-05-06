<?php

namespace App\Models;

use App\Http\Controllers\Utility\ModelUtil;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
    protected $primaryKey = 's_id';
    protected $keyType = 'string';
    public $incrementing = false;

    function getBoss(){
        $employer = Employers::where('e_id', $this->s_id.'000')->first();
        return $employer;
    }

    function getBossFullName(){
        $employer = $this->getBoss();
        return $employer->e_sei.' '.$employer->e_mei;
    }

    function imgUrl(){
        if(empty($this->s_img)){
            return asset('img/noimg.png');
        }
        return asset($this->s_img);
    }

    /**
     * 登録ずみの最後のPCDを返却
     */
    function getLastShopParentCode(){
        $s_pcd = self::select('s_pcd')->orderBy('s_pcd', 'desc')->take(1)->get()->first();
        return $s_pcd->s_pcd;
    }

    /**
     * 新たなPCDを生成する
     */
    function getNewShopParentCode(){
        $int_pcd = (int)$this->getLastShopParentCode();
        $int_pcd++;
        return str_pad(strval($int_pcd), 3, '0', STR_PAD_LEFT);
    }

    /**
     * 登録ずみの最後のSIDを返却
     */
    function getLastKeyForParentShop(){
        $s_pcd = $this->getLastShopParentCode();
        return 'S'.$s_pcd.'000';
    }

    /**
     *
     */
    function getNewKeyForParentShop(){
        $s_pcd = $this->getNewShopParentCode();
        $new_key = 'S'.$s_pcd.'000';
        return $new_key;
    }

}
