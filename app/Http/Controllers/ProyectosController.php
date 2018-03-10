<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Requests\proyectoRequest;
use App\proyectos;
use DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Yajra\Datatables\Datatables;

class ProyectosController extends Controller
{
    public function index($id)
    {   
        $hoy = date('Y-m-d');
        $idA=explode(',', $id);
        $id_usuario = Auth::id();
        $asignatura = DB::table('asignatura')->where('id', '=', $idA[0])->get();
        $grupo = DB::table('grupo')->where('id', '=', $idA[1])->get();
        
        $proyectosPE = DB::table('proyectos')
            ->where('id_profesor','=',$id_usuario)
            ->where('id_asignatura','=',$idA[0])
            ->where('id_grupo','=',$idA[1])
            ->where('fecha_entrega','>=',$hoy)
            ->select('id', 'nombre_proyecto', 'descripcion', 'fecha_entrega', 'archivo', 'url', 'observaciones')
            ->paginate(10);

        $proyectosPF = DB::table('proyectos')
            ->where('id_profesor','=',$id_usuario)
            ->where('id_asignatura','=',$idA[0])
            ->where('id_grupo','=',$idA[1])
            ->where('fecha_entrega','<',$hoy)
            ->select('id', 'nombre_proyecto', 'descripcion', 'fecha_entrega', 'archivo', 'url', 'observaciones')
            ->paginate(10);    

        return view('admin.proyectos.index')->with('asignatura', $asignatura)->with('grupo', $grupo)->with('proyectosPE', $proyectosPE)->with('proyectosPF', $proyectosPF);    		
    }

    //Función no implementada
    public function getProyectos($ids){
        $hoy = date('Y-m-d');
        $idA=explode(',', $ids);
        //$proyectosPE = Proyectos::select(['id','nombre_proyecto','descripcion','fecha_entrega','archivo','url','observaciones'])->where('id_asignatura','=',$idA[0])->where('id_grupo','=',$idA[1])->where('fecha_entrega','>=',$hoy);
        $proyectosPE = DB::table('proyectos')
            ->where('id_asignatura','=',$idA[0])
            ->where('id_grupo','=',$idA[1])
            ->where('fecha_entrega','>=',$hoy)
            ->select('id', 'nombre_proyecto', 'descripcion', 'fecha_entrega', 'archivo', 'url', 'observaciones')
            ->get();           
        return Datatables::of($proyectosPE)->addColumn('action', function ($row) {
            if($row->url=='#'){
                $boton='<a href="#" class="btn btn-success btn-sm video" data-video="'.$row->url.'" data-toggle="modal" data-target="#videoModal"><i class="fa fa-file-video-o fa 2x"></i></a>';
            }else{
                $boton='';
            }
            return $boton;            
            //return '<a href="#edit-'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
        })
        ->make(true);
    }

    /*
    * @return Response
    */
    public function create($id)
    {
        $gId=explode(',', $id);

        $alumnos = DB::table('alumno_grupo')
                    ->select('name','primer_apellido','users.id as id')
                    ->join('users','users.id','=','alumno_grupo.id_alumno')
                    ->join('grupo_asignatura','grupo_asignatura.id_grupo','=','alumno_grupo.id_grupo')
                    ->where('alumno_grupo.id_grupo','=',$gId[1])
                    ->where('grupo_asignatura.id_asignatura','=',$gId[0])->get();
        //dd($alumnos);                    
        return view('admin.proyectos.create')->with('id_a', $gId[0])->with('id_g', $gId[1])->with('alumnos', $alumnos);
    }   
     /*
     * @return Response
     */
    public function store(ProyectoRequest $request)
    {
        $name = '';  
        if($request->archivo!=null){
            $validator = Validator::make(
            [
                'archivo'      => $request->archivo,
                'extension' => strtolower($request->archivo->getClientOriginalExtension()),
            ],
            [
                'archivo'          => 'required',
                'extension'      => 'required|in:doc,csv,xlsx,xls,docx,ppt,odt,ods,odp,pdf',
            ]);

            if($validator->fails()){
            return redirect('admin/proyectos/create/'.$request->id_asignatura.','.$request->id_grupo)->withErrors($validator)->withInput();
            }

            $ruta = "public";
            $name = $request->file('archivo')->getClientOriginalName();
            $ext = $request->file('archivo')->getClientOriginalExtension();
            $request->file('archivo')->storePubliclyAs($ruta,$name);
        }            
        
        //-----------------Crear un enlace embebido de youtube---------------------------
        $urltube = '#';
        if (strpos($request->url, 'youtube.com/watch?v=') !== false || strpos($request->url, 'youtube.com/embed/')) {
          $urltube = str_replace ( 'watch?v=' , 'embed/' , $request->url);
        }        
        //-------------------------------------------------------------------------------

        $hoy = date('Y-m-d');
         
        $id_alumnos = implode(',', (array) $request->input('id_as'));        

        $proyectos = new proyectos($request->all());
        $proyectos->archivo = $name;
        $proyectos->id_profesor = Auth::id();
        $proyectos->url = $urltube;
        $proyectos->fecha_publicacion = $hoy;
        $proyectos->id_alumnos = $id_alumnos;
        $proyectos->save();
        Flash::success('El proyecto se ' . $proyectos->nombre_proyecto . ' ha sido guardado con éxito!');
        return redirect("admin/proyectos/" . $request->id_asignatura.','.$request->id_grupo);

    }
    /**
     * Muestra la empresa deseada.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $proyecto = DB::table('proyectos')
                    ->select('nombre_proyecto','descripcion','fecha_entrega','archivo','url','observaciones','name','primer_apellido')
                    ->join('users','users.id','=','proyectos.id_profesor')
                    ->where('proyectos.id','=',$id)->get();
        return view('admin.proyectos.show')->with('proyecto', $proyecto);
    }
    public function edit($id)
    {
    	$proyectos = proyectos::find($id);
        $alumnos = DB::select('select u.id as id, u.name, u.primer_apellido,
                                case when exists(select id_alumnos from proyectos p where FIND_IN_SET(u.id,p.id_alumnos) and id = '.$id.')
                                    then 
                                        "1"
                                    else 
                                        "0"
                                    end as checked    
                                from 
                                    users u, alumno_grupo ag, grupo_asignatura ga
                                where 
                                    u.id = ag.id_alumno and
                                    ag.id_grupo = ga.id_grupo and
                                    ga.id_grupo = '.$proyectos->id_grupo.' and
                                    ga.id_asignatura = '.$proyectos->id_asignatura);
    	return view('admin.proyectos.edit')->with('proyecto', $proyectos)->with('alumnos',$alumnos);        
    }

    /**
     * Actualiza la empresa deseada.
     *
     * @param  int $id
     * @return Response
     */
     public function update(request $request,$id)
    {
        $name = '';  
        if($request->archivo!=null){
            $validator = Validator::make(
            [
            'archivo'      => $request->archivo,
            'extension' => strtolower($request->archivo->getClientOriginalExtension()),              

            ],
            [
            'archivo'          => 'required',
            'extension'      => 'required|in:doc,csv,xlsx,xls,docx,ppt,odt,ods,odp,pdf',
            ]);

            if($validator->fails()){
            return redirect('admin/proyectos/create/'.$request->id_asignatura.','.$request->id_grupo)->withErrors($validator)->withInput();
            }

            $ruta = "public";
            $name = $request->file('archivo')->getClientOriginalName();
            $ext = $request->file('archivo')->getClientOriginalExtension();
            $request->file('archivo')->storePubliclyAs($ruta,$name);                
        }            
        
        //-----------------Crear un enlace embebido de youtube---------------------------
        $urltube = '#';
        if (strpos($request->url, 'youtube.com/watch?v=') !== false || strpos($request->url, 'youtube.com/embed/')) {
          $urltube = str_replace ( 'watch?v=' , 'embed/' , $request->url);
        }        
        //-------------------------------------------------------------------------------

        $id_alumnos = implode(',', (array) $request->input('id_as'));

        $id_asignatura = DB::select('select id_asignatura from proyectos where id='.$id);
        $id_grupo = DB::select('select id_grupo from proyectos where id='.$id);
        $proyecto= proyectos::find($id);        
        $proyecto->id_alumnos = $id_alumnos;
        $proyecto->nombre_proyecto = $request->nombre_proyecto;
        $proyecto->fecha_entrega = $request->fecha_entrega;
        $proyecto->archivo = $name;
        $proyecto->url = $urltube;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->save();

        Flash::warning('El proyecto ' . $proyecto->nombre_proyecto . ' ha  sido editado con exito!');
        return redirect("admin/proyectos/" . $id_asignatura[0]->id_asignatura . ','.$id_grupo[0]->id_grupo);
    }

    /**
     * Elimina una empresa del sistema.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $id_asignatura = DB::select('select id_asignatura from proyectos where id ='.$id);
        $id_grupo = DB::select('select id_grupo from proyectos where id ='.$id);
        $proyecto= proyectos::find($id);
        //dd($user);   lo muestra si lo consigue
        $proyecto->delete();
        Flash::error('El proyecto '  . $proyecto->titulo .  ' ha sido borrado de forma exitosa!' );
        return redirect("admin/proyectos/" . $id_asignatura[0]->id_asignatura.','.$id_grupo[0]->id_grupo);
    }
    public function descargar($url){
        return response()->download(storage_path('app\\public\\'.$url));
    }
}