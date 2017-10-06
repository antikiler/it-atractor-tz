<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table = 'reviews';

    public function behavior()
   	{
   		return $this->belongsTo('App\Models\Behavior','id_behavior','id');
   	}
   	public function user()
   	{
   		return $this->belongsTo('App\Models\User','id_user','id');
   	}
}
