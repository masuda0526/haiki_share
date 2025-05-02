<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $primaryKey = 'c_id';
    protected $keyType = 'string';
    public $incrementing = false;

    function group(){
        return $this->belongsTo(Group::class, 'c_id', 'g_id');
    }
}
