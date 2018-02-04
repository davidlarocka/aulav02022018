<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alumno_asignatura extends Model
{
   protected $table= "alumno_asignatura";

    protected $fillable= ['id_alumno','id_asignatura'];
}
