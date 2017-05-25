<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_login', 'user_perfil', 'user_password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public $rules = [
        'user_login' => "required|min:5|max:40",
        'user_password' => "required|min:7|max:24",
        'user_perfil' => "required",
    ];
    
    public $rulesEdit = [
        'user_password' => "required",
        ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];

}
