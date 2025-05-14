<?php

namespace App\Http\Controllers\Utility;

enum ProductStatusKubun: int{

    case CURRENT_UNDER_SALE = 0;
    case ALREADY_PARCHASED =1;
    case CANCEL_SALE = 2;

    function getStatusName(){
        return match($this){
            self::CURRENT_UNDER_SALE=>'販売中',
            self::ALREADY_PARCHASED=>'購入済',
            self::CANCEL_SALE=>'停止中'
        };
    }

    public static function toArray():array{
        return array_column(self::cases(), 'value', 'name');
    }

    public static function valueToLabel(): array {
        return array_reduce(self::cases(), function ($carry, $case) {
            $carry[$case->value] = $case->getStatusName();
            return $carry;
        }, []);
    }
}
