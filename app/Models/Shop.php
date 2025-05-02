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

    function getLastKeyForParentShop(){
        $s_pcd = self::select('s_pcd')->orderBy('s_pcd', 'desc')->take(1)->get()->first();
        return 'S'.$s_pcd->s_pcd.'000';
    }

    function getNewKeyForParentShop(){
        $s_pcd = self::select('s_pcd')->orderBy('s_pcd', 'desc')->take(1)->get()->first();
        $new_pcd = ModelUtil::getNewPrimaryKey('S'.$s_pcd->s_pcd);
        $new_key = $new_pcd.'000';
        return $new_key;
    }

}
