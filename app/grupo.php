<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grupo extends Model
{
   protected $table= "grupo";

    protected $fillable= ['descripcion'];
}
