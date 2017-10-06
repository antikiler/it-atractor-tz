<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryBehavior extends Model
{
    protected $table = 'gallery_behaviors';

    public function behavior()
   	{
   		return $this->belongsTo('App\Models\Behavior','id_behavior','id');
   	}
}
