<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employers extends Model
{
    protected $primaryKey = 'e_id';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * フルネームを返却
     */
    function getFullName(){
        return $this->e_sei.' '.$this->e_mei;
    }

    /**
     * 引数に渡された権限を持っているか判定
     */
    function hasAuth($str){
        $auths = explode(',', $this->auth);
        return in_array($str, $auths);
    }

    /**
     * 店長かどうか判定
     */
    function isBoss(){
        return $this->e_cd == '000';
    }
}
