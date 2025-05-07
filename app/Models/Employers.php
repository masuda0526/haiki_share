<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employers extends Model
{
    protected $primaryKey = 'e_id';
    protected $keyType = 'string';
    public $incrementing = false;
    //
    function getFullName(){
        return $this->e_sei.' '.$this->e_mei;
    }

    function hasAuth($str){
        $auths = explode(',', $this->auth);
        return in_array($str, $auths);
    }
}
