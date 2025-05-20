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

    /**
     * 新たな従業員コード（e_cd）を生成します
     */
    function getNewEmployerCd(String $shopId){
        $newCd = (int)self::select('e_cd')->where('s_id', $shopId)->orderBy('e_cd', 'desc')->first()->e_cd;
        $newCd++;
        return str_pad($newCd, 3, '0', STR_PAD_LEFT);
    }

    /**
     * フォームから入力された権限を登録可能な形で出力します。
     */
    function toStringForRegistDB(array $auths){
        $authStr = '';
        if(empty($auths)){
            return $authStr;
        }

        foreach($auths as $key => $val){
            $authStr .= $val.',';
        }

        return substr($authStr, 0, -1);

    }

    /**
     * 権限の配列を返却します。
     */
    function toArrayOfAuth(){
        $array = explode(',', $this->auth);
        return $array;
    }
}
