<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class  proyectos extends Model
{
    protected $table= "proyectos";
    protected $fillable= ['nombre_proyecto','id_grupo','id_asignatura','descripcion','fecha_publicacion','fecha_entrega','archivo','url','observaciones'];
    public function scopeSearch($query, $descripcion)
	{
		return $query->where('descripcion', 'LIKE', "%$descripcion%");
 	}
}