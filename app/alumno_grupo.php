<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alumno_grupo extends Model
{
   protected $table= "alumno_grupo";

    protected $fillable= ['id_alumno','id_grupo'];
}		
