<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Requests\CursosRequest;
use App\Curso;

class CursosController extends Controller
{

    public function index(Request $Request)
    {
        $cursos = Curso::search($Request->descripcion)->orderBy('id', 'Desc')->paginate(5);

        //dd($asignaturas);

        return view('admin.cursos.index')->with('curs', $cursos);
    }


   /**
     * Muestra el formulario
     *
     * @return Response
     */
  public function create()
    {
       return view('admin.cursos.create');
    }  

     /**
     * Muestra el formulario
     * @return Response
     */
  public function store(CursosRequest $request)
    {
    $cursos = new Curso($request->all());
    //dd($asignaturas);
    	$cursos->save();
    	Flash::success('El curso ' . $cursos->descripcion . ' ha sido guardada con exito!');
    	return redirect()->route('cursos.index');  
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
   $cursos = Curso::find($id);
    	return view('admin.cursos.edit')->with('curs', $cursos);
        
    }   

  /**
     * Muestra el formulario 
     *
     * @param  int $id
     * @return Response
     */
    public function update(request $request,$id)
    {
    	$cursos= Curso::find($id);
    	$cursos->descripcion = $request->descripcion;
    	$cursos->save();

    	Flash::warning('El Curso ' . $cursos->descripcion . ' ha  sido editado con exito!');
    	return redirect()->route('cursos.index'); 
     
    }  
   
     /**
     * Muestra el formulario
     *
     * @param  int $id
     * @return Response
     */
   public function destroy($id)
    {
        //dd($id);
       $cursos = Curso::find($id);
        $cursos->delete();

        Flash::error('El curso ' .$cursos->descripcion. ' Fue eliminado con exito!');

        return redirect()->route('cursos.store');
    }




}
