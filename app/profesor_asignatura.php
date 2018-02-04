<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profesor_asignatura extends Model
{
   protected $table= "profesor_asignatura";

    protected $fillable= ['id_profesor','id_asignatura'];

    public function asignatura()
	{
		return $this ->belongsTo('App\asignatura');
	}

}





