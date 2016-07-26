<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{


    public static $ROLE_ADMIN = 0;
    public static $ROLE_USER = 1;

    public static $ACTIVE = 1 ;
    public static $NON_ACTIVE = 0 ;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id', 'is_active'
    ];

    public function isAdmin() {
        return $this->role_id == $this::$ROLE_ADMIN;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
