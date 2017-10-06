<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'title','active','alias'
    ];
    public function behavior()
    {
        return $this->hasMany('App\Models\Behavior','id_user','id');
    }
}
