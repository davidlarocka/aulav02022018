<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profesor extends Model
{
   protected $table= "profesor";

    protected $fillable= ['id_profesor','primer_nombre','segundo_nombre','primer_apellido','segundo_apellido','rut','sexo','fecha_nacimiento'];
}
