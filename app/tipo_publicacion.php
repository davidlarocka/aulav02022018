<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_publicacion extends Model
{
    protected $table= "tipo_publicacion";

    protected $fillable= ['nombre'];
}
