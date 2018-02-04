<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
//use App\Http\Requests\CategoriaRequest;
use App\Articulo;
use App\Categoria;
use App\Imagen;
use App\User;
use App\Http\Requests\ArticulosRequest;
use Illuminate\support\Facades\Redirect;

class ArticulosController extends Controller
{

    public function index(Request $Request)
    {
        $articulos = Articulo::Search($Request->titulo )->orderBy('id','DESC')->paginate(5);
        $articulos->each(function($articulos){
            $articulos->categoria;
                $articulos->user;
 });

          // dd($articulos);
   
 return view('admin.articulos.index')->with('articulos', $articulos);

  

}
    /**
     * Muestra el formulario para crear una nueva empresa.
     *
     * @return Response
     */
    public function create()
    {
    	$categorias = Categoria::orderBy('nombre','ASC')->pluck('nombre','id');
        //
        //$tags = Tag::orderBy('nombre','ASC')->pluck('nombre','id');
       return view('admin.articulos.create')
              ->with('categorias', $categorias);
              //->with('tags', $tags);
    }

    /**
     * Guarda la nueva empresa creada.
     *
     * @return Response
     */
    public function store(Request $request)
    

   {
    	$file = $request->file('image');
    	$name = 'imag_' . time() .'.' . $file->getClientOriginalExtension();
    	$path = public_path() . '/images_n/articulos';
    	$file->move($path, $name);
    

    $articulos = new Articulo($request->all());
    $articulos->usuario_id = \Auth::user()->id;
    $articulos->save();

   //$articulo->tags()->sync($request->tag_id);
 $image =  new Imagen();
    $image->nombre = $name;
    $image->articulo()->associate($articulos);
    $image->save();

    Flash::success('Se ha creado el articulo ' . $articulos->titulo . ' con exito!');
    return redirect()->route('articulos.index');
    //dd(\Auth::user()->name);

}
    /**
     * Muestra la empresa deseada.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        
    }

    /**
     * Muestra el formulario para modificar la empresa deseada.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $articulos = Articulo::find($id);
        $articulos->categoria;
        $categoria = Categoria::orderBy('nombre','DESC')->pluck('nombre','id');
 //dd($articulos);   
        return view('admin.articulos.edit')
        ->with('articulos', $articulos)
        ->with('categoria',$categoria);     
    }

    /**
     * Actualiza la empresa deseada.
     *
     * @param  int $id
     * @return Response
     */
    public function update(request $request,$id)
    {
    	$articulos = Articulo::find($id);
        $articulos->fill($request->all());
        $articulos->save();

        Flash::warning('Se ha editado ' . $articulos->titulo . ' de forma exitosa');
        return redirect()->route('articulos.index');
    }

    /**
     * Elimina una empresa del sistema.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $articulos = Articulo::find($id);
        $articulos->delete();

        Flash::error('El articulo ' .$articulos->titulo. ' Fue eliminada con exito!');

        return redirect()->route('articulos.index');
      
    }

}