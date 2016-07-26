<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Every user that authenticates belongs to a one or more sites
     *
     * @param null
     * @return null
     */
    public function sites()
    {
        return $this->belongsToMany('App\Site', 'sites_users');
    }
}
