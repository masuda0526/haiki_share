<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $primaryKey = 'g_id';
    //
    function category(){
        return $this->hasMany(Category::class, 'g_id', 'g_id');
    }
}
