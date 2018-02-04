<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class asignatura extends Model
{
    protected $table= "asignatura";

    protected $fillable= ['id','descripcion'];
}
