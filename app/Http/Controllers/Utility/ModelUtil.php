<?php

namespace App\Http\Controllers\Utility;

use App\Models\Category;
use App\Models\Group;
use App\Models\Prefecture;
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

    /**
     * 都道府県コードから、都道府県名を返却します
     */
    public static function getPrefName(int $pref_id){
        return Prefecture::select('pref_name')->where('pref_id', $pref_id)->first()->pref_name;
    }

    /**
     * カテゴリIDからカテゴリ名とグループ名を返却します
     */
    public static function getCategoryAndGroup($category_id){
        if(empty($category_id)){
            return '';
        }
        $category = Category::find($category_id);
        $group = Group::find($category->g_id);
        $data['category_name'] = $category->c_name;
        $data['group_name'] = $group->g_name;
        return $data;
    }

    /**
     * カテゴリーIDからカテゴリ名を返却
     */
    public static function getCategoryName($category_id){
        $data = self::getCategoryAndGroup($category_id);
        if(empty($data)){
            return '';
        }
        return $data['category_name'];
    }

    /**
     * カテゴリーIDからグループ名を返却
     */
    public static function getGroupName($category_id){
        $data = self::getCategoryAndGroup($category_id);
        if(empty($data)){
            return '';
        }
        return $data['group_name'];
    }


}
