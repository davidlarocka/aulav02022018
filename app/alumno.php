<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
   protected $table= "alumno";

    protected $fillable= ['id_alumno','primer_nombre','segundo_nombre','primer_apellido','segundo_apellido','rut','sexo','fecha_nacimiento'];
}
