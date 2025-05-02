<?php

namespace App\Models;

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
}
