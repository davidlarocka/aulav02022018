<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Asignatura_admin extends Model
{
    protected $table= "asignatura";

    protected $fillable= ['descripcion'];

 /*   public function articulos()
{
    return $this ->hasMany('App\Articulo');

 }  */

 

public function scopeSearch($query, $descripcion)

{
	return $query->where('descripcion', 'LIKE', "%$descripcion%");

 }
}
