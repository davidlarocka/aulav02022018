<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profesor_grupo extends Model
{
    rotected $table= "profesor_grupo";

    protected $fillable= ['id_profesor_asignatura','id_grupo'];
}
