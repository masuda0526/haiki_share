<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Controllers\Utility\ModelUtil;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $primaryKey = 'u_id';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    function pref(){
        return $this->belongsTo(Prefecture::class, 'u_pref', 'pref_id');
    }

    /**
     * 新規利用者IDを発行します。
     */
    public function getNewKey(){
        $lastkey = self::select('u_id')->orderBy('u_id', 'desc')->take(1)->get()->first();
        $newkey = ModelUtil::getNewPrimaryKey($lastkey->u_id);
        Log::debug("新規利用者キー発行：", [$newkey]);
        return $newkey;
    }

    /**
     * フルネームを返却します
     */
    public function getFullName(){
        return $this->u_sei.' '.$this->u_mei;
    }
}
