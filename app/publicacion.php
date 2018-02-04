<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publicacion extends Model
{
    protected $table= "publicacion";

    protected $fillable= ['titulo','autor','id_asignatura','id_tipo_publicacion'];
}
