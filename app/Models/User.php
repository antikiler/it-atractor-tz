<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','last_name', 'email', 'password','active','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','role',
    ];
    public function isAdmin()
    {
        return $this->role;
    }

    public function behavior()
    {
        return $this->hasMany('App\Models\Behavior','id_user','id');
    }

    public function gallerys()
    {
        return $this->hasMany('App\Models\GalleryUser','id_user','id');
    }
    public function reviews()
    {
        return $this->hasMany('App\Models\Reviews','id_user','id');
    }
}
