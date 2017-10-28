<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 
        'avatar', 'provider_id', 'provider',
        'access_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // bang comment
    public function comment(){
        return $this->hasMany('App\Comment', 'idUser', 'id');
    }
    // verification token
    // public function verificationToken(){
    //     return $this->hasOne(VerificationToken::class);
    // }

    public function getAvatarAttribute($val)
    {
        return is_null($val) ? asset('image/18bdwssyxpibxjpg.jpg') : asset('upload/users/'.$val);
    }
}
