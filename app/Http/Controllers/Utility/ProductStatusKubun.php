<?php

namespace App\Http\Controllers\Utility;

enum ProductStatusKubun: int{

    case CURRENT_UNDER_SALE = 0;
    case ALREADY_PARCHASED =1;
    case CANCEL_SALE = 2;
    case DELETE_PRODUCT = 9;

    function getStatusName(){
        return match($this){
            self::CURRENT_UNDER_SALE=>'販売中',
            self::ALREADY_PARCHASED=>'購入済',
            self::CANCEL_SALE=>'停止中',
            self::DELETE_PRODUCT=>'削除済'
        };
    }

    public static function toArray():array{
        return array_column(self::cases(), 'value', 'name');
    }

    public static function valueToLabel(): array {
        return array_reduce(self::cases(), function ($carry, $case) {
            $exclude = [1, 9];
            if(!in_array($case->value, $exclude)){
                $carry[$case->value] = $case->getStatusName();
            }
            return $carry;
        }, []);
    }
}
