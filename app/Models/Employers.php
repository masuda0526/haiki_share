<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employers extends Model
{
    //
    function getFullName(){
        return $this->e_sei.' '.$this->e_mei;
    }
}
