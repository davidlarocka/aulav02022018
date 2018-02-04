<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class multimedia_contenido extends Model
{
    protected $table= "multimedia_contenido";

    protected $fillable= ['id_contenido','id_multimedia'];
}
