<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table= "categorias";

    protected $fillable= ['nombre'];

 /*   public function articulos()
{
    return $this ->hasMany('App\Articulo');

 }  */

 

public function scopeSearch($query, $nombre)

{
	return $query->where('nombre', 'LIKE', "%$nombre%");

 }
}
