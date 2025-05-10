<?php

namespace App\Http\Controllers\Utility;

enum ProductStatusKubun: int{

    case CURRENT_UNDER_SALE = 0;
    case ALREADY_PARCHASED =1;
    case CANCEL_SALE = 2;

    public static function toArray():array{
        return array_column(self::cases(), 'value', 'name');
    }
}
