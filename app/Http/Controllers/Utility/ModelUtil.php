<?php

namespace App\Http\Controllers\Utility;

use Illuminate\Support\Facades\Log;

class ModelUtil{

    /**
     * String型のプライマリー先頭１文字目がアルファベットのものを入力する。
     * 次の番号が裁判されて返却される。
     * @param String 例:'U00000'
     * @return String 'U00001'
     */
    public static function getNewPrimaryKey(String $str){
        $len = mb_strlen($str);
        $alf = substr($str, 0, 1);
        $numstr = substr($str, 1);
        $numadd = intval($numstr) + 1;
        $numaddstr = strval($numadd);
        while (mb_strlen($numaddstr) < $len -1){
            Log::debug('getNewPrimaryKey:', [$str, $len,$alf, $numstr, $numadd, $numaddstr]);
            $numaddstr = '0'.$numaddstr;

        }
        return $alf.$numaddstr;
    }



}
