<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Requests\AlumnoAsigRequest;
use App\alumnoAsig;
use DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Yajra\Datatables\Datatables;

class AlumnoAsigController extends Controller
{
    public function index()
    {   
        $id_alumno = Auth::id();
      
        $datos = DB::table('alumno_grupo')
                ->select('grupo.descripcion as grupo','asignatura.id as id_asignatura','asignatura.descripcion as asignatura','grupo.id as id_grupo')
                ->join('grupo','grupo.id','=','alumno_grupo.id_grupo')
                ->join('grupo_asignatura','grupo_asignatura.id_grupo','=','alumno_grupo.id_grupo')                
                ->join('asignatura','asignatura.id','=','grupo_asignatura.id_asignatura')
                ->orderBy('asignatura.descripcion','asc')                
                ->where('alumno_grupo.id_alumno','=',$id_alumno)->paginate(10);
        $publicaciones = DB::table('tipo_publicacion')                    
                        ->select('id as id_publicacion','descripcion')
                        ->orderBy('tipo_publicacion.descripcion','asc')->get();
        return view('admin.alumnosAsig.index')->with('datos', $datos)->with('publicaciones', $publicaciones);
    }

    //Para las publicaciones es necesario id_tipo_publicacion, id_asignatura, id_grupo
    public function publicaciones($ids){
        $idPag = explode(",", $ids);

        $id_alumno = Auth::id();

        if ($idPag[0]==3) {
            $publicaciones = DB::table('publicacion')
                        ->select('publicacion.titulo as titulo','publicacion.descripcion as descripcion','publicacion.archivo as archivo','publicacion.url as url','publicacion.Observacion as observacion','users.name as nombreProf','users.primer_apellido as apellidoProf')                        
                        ->join('users','users.id','=','publicacion.id_profesor')
                        ->where('id_tipo_publicacion','=',$idPag[0])
                        ->where('id_asignatura','=',$idPag[1])
                        ->where('id_grupo','=',$idPag[2])
                        ->whereRaw('FIND_IN_SET('.$id_alumno.',publicacion.id_alumnos)')
                        ->orderBy('publicacion.updated_at','asc')->paginate(10);
        }else{
            $publicaciones = DB::table('publicacion')
                        ->select('publicacion.titulo as titulo','publicacion.descripcion as descripcion','publicacion.archivo as archivo','publicacion.url as url','publicacion.Observacion as observacion','users.name as nombreProf','users.primer_apellido as apellidoProf')                        
                        ->join('users','users.id','=','publicacion.id_profesor')
                        ->where('id_tipo_publicacion','=',$idPag[0])
                        ->where('id_asignatura','=',$idPag[1])
                        ->where('id_grupo','=',$idPag[2])
                        ->orderBy('publicacion.updated_at','asc')->paginate(10);
        }
        
        $publicacion = DB::table('tipo_publicacion')
                        ->select('tipo_publicacion.descripcion as publicacion')
                        ->where('tipo_publicacion.id','=',$idPag[0])->get();
        $asignatura = DB::table('asignatura')
                        ->select('asignatura.descripcion as asignatura')
                        ->where('asignatura.id','=',$idPag[1])->get();        
        $grupo = DB::table('grupo')
                    ->select('grupo.descripcion as grupo')
                    ->where('grupo.id','=',$idPag[2])->get();          
        return view('admin.alumnosAsig.publicaciones')->with('publicaciones', $publicaciones)->with('publicacion', $publicacion)->with('asignatura', $asignatura)->with('grupo', $grupo)->with('id_tipo_publicacion', $idPag[0]);   
    }

    public function proyectos($ids){
        $id_alumno = Auth::id();
        $idAg = explode(",", $ids);
        $hoy = date('Y-m-d');
        $proyectosPe = DB::table('proyectos')
                        ->select('proyectos.id as id','nombre_proyecto','descripcion','archivo','url','name','primer_apellido','fecha_entrega','observaciones')
                        ->join('users','users.id','=','proyectos.id_profesor')
                        ->where('proyectos.id_asignatura','=',$idAg[0])
                        ->where('proyectos.id_grupo','=',$idAg[1])
                        ->where('fecha_entrega','>=',$hoy)
                        ->whereRaw('FIND_IN_SET('.$id_alumno.',proyectos.id_alumnos)')->paginate(10);
        $proyectosPf = DB::table('proyectos')
                        ->select('nombre_proyecto','descripcion','archivo','url','name','primer_apellido','fecha_entrega','observaciones')
                        ->join('users','users.id','=','proyectos.id_profesor')
                        ->where('proyectos.id_asignatura','=',$idAg[0])
                        ->where('proyectos.id_grupo','=',$idAg[1])
                        ->where('fecha_entrega','<=',$hoy)
                        ->whereRaw('FIND_IN_SET('.$id_alumno.',proyectos.id_alumnos)')->paginate(10);
        $asignatura = DB::table('asignatura')
                        ->select('asignatura.descripcion as asignatura')
                        ->where('asignatura.id','=',$idAg[0])->get();        
        $grupo = DB::table('grupo')
                    ->select('grupo.descripcion as grupo')
                    ->where('grupo.id','=',$idAg[1])->get();
        return view('admin.alumnosAsig.proyectos')->with('proyectosPe', $proyectosPe)->with('proyectosPf', $proyectosPf)->with('asignatura', $asignatura)->with('grupo', $grupo);   
    }

    public function descargar($url){
        return response()->download(storage_path('app\\public\\'.$url));
    }
}