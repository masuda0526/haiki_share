<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    //
    protected $primaryKey = 'pref_id';
    protected $keyType = 'string';
    public $incrementing = false;

    function users(){
        return $this->hasMany(User::class, 'u_pref', 'pref_id');
    }

}
