<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Requests\CategoriaRequest;
use App\Categoria;

class CategoriasController extends Controller
{

    public function index(Request $Request)
    {
        $categorias = Categoria::search($Request->nombre)->orderBy('id', 'Desc')->paginate(5);

        return view('admin.categorias.index')->with('categorias', $categorias);
    }


    /**
     * Muestra el formulario para crear una nueva empresa.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.categorias.create');
    }

    /**
     * Guarda la nueva empresa creada.
     *
     * @return Response
     */
    public function store(CategoriaRequest $request)
    {
    	$categoria = new Categoria($request->all());
    	//dd($categoria);
    	$categoria->save();
    	Flash::success('La categoria ' . $categoria->nombre . ' ha sido guardada con exito!');
    	return redirect()->route('categorias.index');
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
     $categoria = Categoria::find($id);
    	return view('admin.categorias.edit')->with('categoria', $categoria);
        
    }

    /**
     * Actualiza la empresa deseada.
     *
     * @param  int $id
     * @return Response
     */
    public function update(request $request,$id)
    {
    	$categoria= Categoria::find($id);
    	$categoria->nombre = $request->nombre;
    	$categoria->save();

    	Flash::warning('La categoria ' . $categoria->nombre . ' ha  sido editado con exito!');
    	return redirect()->route('categorias.xml_get_current_byte_index(parser)');
     
    }

    /**
     * Elimina una empresa del sistema.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //dd($id);
        $categoria = Categoria::find($id);
        $categoria->delete();

        Flash::error('La categoria ' .$categoria->nombre. ' Fue eliminada con exito!');

        return redirect()->route('categorias.store');
    }




}
