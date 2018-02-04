<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class img_user extends Model
{
   protected $table = "img_user";

   protected $fillable = ['nombre', 'user_id'];


public function user()
    {

    	return $this->belongsTo('App\User');
    }
}
