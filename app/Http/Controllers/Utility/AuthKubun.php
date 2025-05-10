<?php

namespace App\Http\Controllers\Utility;

enum AuthKubun: string{
    case BROWSE = '00';
    case EDIT_SHOP = '01';
    case EDIT_PRODUCT = '02';
    case EDIT_EMPLOYER = '03';

    function getAuthName(){
        return match($this){
            self::BROWSE => '閲覧権限',
            self::EDIT_SHOP => '店舗情報編集権限',
            self::EDIT_PRODUCT => '商品情報編集権限',
            self::EDIT_EMPLOYER => '従業員編集'
        };
    }

    public static function toArray():array{
        return array_column(self::cases(), 'value', 'name');
    }

    public static function toAuthArray(): array {
        return array_reduce(self::cases(), function ($carry, $case) {
            $carry[$case->value] = $case->getAuthName();
            return $carry;
        }, []);
    }

}
