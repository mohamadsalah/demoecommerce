<?php

namespace App;
use Laravel\Passport\HasApiTokens;

use Illuminate\Notifications\Notifiable;


use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\product;
use App\Notifications\report;

class User extends Authenticatable
{
  use HasApiTokens, Notifiable;
 use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'id','name', 'email', 'password','phone','adress'
,'about', 'provider', 'provider_id','profile_picture',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function product(){
    return  $this->hasMany('App\product','user_id','id');
}
}
