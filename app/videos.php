<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class  videos extends Model
{
    protected $table= "publicacion";
    protected $fillable= ['id_tipo_publicacion','id_asignatura','titulo','descripcion','url','Observacion','id_profesor'];
    public function scopeSearch($query, $descripcion)
	{
		return $query->where('descripcion', 'LIKE', "%$descripcion%");
 	}
}