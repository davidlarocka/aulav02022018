<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class materialcs extends Model
{
    protected $table= "publicacion";
    protected $fillable= ['id_tipo_publicacion','id_asignatura','id_grupo','titulo','descripcion','url','Observacion','id_profesor'];
}