<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Requests\AsignaturaRequest;
use App\Asignatura_admin;

class Asignatura_adminController extends Controller
{

    public function index(Request $Request)
    {
        $asignaturas = Asignatura_admin::search($Request->descripcion)->orderBy('id', 'Desc')->paginate(5);

        //dd($asignaturas);

        return view('admin.asignatura_admin.index')->with('asig', $asignaturas);
    }


 /**
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.asignatura_admin.create');
    }

   
   /**
     *
     * @return Response
     */
    public function store(AsignaturaRequest $request)
    {
    $asignaturas = new Asignatura_admin($request->all());
    //dd($asignaturas);
    	$asignaturas->save();
    	Flash::success('La asignatura ' . $asignaturas->descripcion . ' ha sido guardada con exito!');
    	return redirect()->route('asignatura_admin.index');  
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
   $asignaturas = Asignatura_admin::find($id);
    	return view('admin.asignatura_admin.edit')->with('asig', $asignaturas);
        
    }

    /**

     *
     * @param  int $id
     * @return Response
     */
    public function update(request $request,$id)
    {
    	$asignaturas= Asignatura_admin::find($id);
    	$asignaturas->descripcion = $request->descripcion;
    	$asignaturas->save();

    	Flash::warning('La asignatura ' . $asignaturas->descripcion . ' ha  sido editado con exito!');
    	return redirect()->route('asignatura_admin.index'); 
     
    }

/**
   
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //dd($id);
       $asignaturas = Asignatura_admin::find($id);
        $asignaturas->delete();

        Flash::error('La asignatura ' .$asignaturas->descripcion. ' Fue eliminada con exito!');

        return redirect()->route('asignatura_admin.store');
    }




}
