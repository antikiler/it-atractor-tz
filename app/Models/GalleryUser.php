<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryUser extends Model
{
    protected $table = 'gallery_users';

    public function user()
   	{
   		return $this->belongsTo('App\Models\User','id_user','id');
   	}
}
