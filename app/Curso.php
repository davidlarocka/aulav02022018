<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table= "grupo";

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
