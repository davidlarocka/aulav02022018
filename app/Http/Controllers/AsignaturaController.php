<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Requests\asignaturaRequest;
use App\asignatura;
use DB;
use Illuminate\Support\Facades\Auth;

class AsignaturaController extends Controller
{
   public function index(Request $Request)
    {
    	$id_usuario = Auth::id();    	
    	$asignaturas = DB::select('select a.id as id, a.descripcion as descripcion from asignatura a, profesor p, profesor_asignatura pa where a.id = pa.id_asignatura and pa.id_profesor = '.$id_usuario.' group by a.id');
        return view('admin.asignaturas.index')->with('asignaturas', $asignaturas);
    		
    }
    /*public function dropCascada()
    {
    		
    }*/
    
    public function grupoAjax($id)
    {
        $id_usuario = Auth::id();
		$grupos = DB::table('profesor_asignatura')->join('grupo','grupo.id','=','profesor_asignatura.id_grupo')
            ->where('id_asignatura','=',$id)
            ->where('id_profesor','=',$id_usuario)
            ->pluck("grupo.descripcion as descripcion","grupo.id as id_grupo")->all();
		return json_encode($grupos);
    			
    }
}
