<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Behavior extends Model
{
    protected $table = 'behaviors';

   	public function user()
   	{
   		return $this->belongsTo('App\Models\User','id_user','id');
   	}

   	public function category()
   	{
   		return $this->belongsTo('App\Models\Category','id_category','id');
   	}

   	public function gallerys()
    {
        return $this->hasMany('App\Models\GalleryBehavior','id_behavior','id');
    }
    
    public function reviews()
    {
        return $this->hasMany('App\Models\Reviews','id_behavior','id');
    }
}
