<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Requests\AsignaturaRequest;
use App\Asignatura_admin;
use DB;

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
       $grupos = DB::table('grupo')->get(); 
       return view('admin.asignatura_admin.create')->with('grupos',$grupos);
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
        //dd($request->input('grupos'));
        
        $id_grupos = array();
        $data = array();
        $i = 0;

        foreach ((array)$request->input('grupos') as $key => $value) {
            //$id_grupos = ['id_grupo'=>$value, 'id_asignatura'=>$asignaturas->id];
            $data[$i] = ['id_grupo'=>$value, 'id_asignatura'=>$asignaturas->id];
            $i++;                        
        }

        DB::table('grupo_asignatura')->insert($data);

    	Flash::success('La asignatura ' . $asignaturas->descripcion . ' ha sido guardada con éxito!');
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

        $grupos = DB::select('select grupo.id as id, grupo.descripcion as descripcion, 
                        case when exists (select id_grupo from grupo_asignatura ga, grupo g where ga.id_grupo = g.id and id_asignatura = '.$asignaturas->id.' and grupo.id=id_grupo) 
                        then 
                            "1" 
                        else 
                            "0" end as mostrar 
                        from grupo');

    	return view('admin.asignatura_admin.edit')->with('asig', $asignaturas)->with('grupos', $grupos);        
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

        //------------------------------Eliminar asociación de grupos con asignaturas-------------------

        DB::select('delete from grupo_asignatura where id_asignatura = '.$asignaturas->id);

        //-------------------------------------------Fin------------------------------------------------        

        //---------------------Guardar listado de grupos asociados a la asignatura----------------------
        $id_grupos = array();
        $data = array();
        $i = 0;

        foreach ((array)$request->input('grupos') as $key => $value) {
            //$id_grupos = ['id_grupo'=>$value, 'id_asignatura'=>$asignaturas->id];
            $data[$i] = ['id_grupo'=>$value, 'id_asignatura'=>$asignaturas->id];
            $i++;                        
        }

        DB::table('grupo_asignatura')->insert($data);                         
        //---------------------------------------Fin----------------------------------------------------

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
