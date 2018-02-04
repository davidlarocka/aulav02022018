<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

//class Articulo extends Model implements SluggableInterface
class Articulo extends Model

{

/*	use SluggableTrait;

	protected $sluggable =  [
	    'build_from' => 'titulo',
        'save_to'   => 'slug'
];  */

     protected $table= "articulos";

    protected $fillable= ['titulo','contenido','categoria_id','tag_id','usuario_id','fecha'];


     public function categoria()
{
    return $this ->belongsTo('App\Categoria');

 }


      public function user()
{
    return $this ->belongsTo('App\User');
  }

     
      public function imagenes()
{
    return $this ->hasMany('App\Imagen');
 }

 public function scopeSearch($query, $titulo)

{
	return $query->where('titulo', 'LIKE', "%$titulo%");

 }


}



