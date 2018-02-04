<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Requests\capsulaRequest;
use App\capsulas;
use DB;
use Illuminate\Support\Facades\Auth;
use Validator;

class CapsulasController extends Controller
{
    public function index($id)
    {   

      $idA=explode(',', $id);

    	$id_usuario = Auth::id();
    	//$asignatura = capsulas::find($id);
      $asignatura = DB::table('asignatura')->where('id', '=', $idA[0])->get();
      $grupo = DB::table('grupo')->where('id', '=', $idA[1])->get();      

      $capsulas = DB::table('publicacion')
            ->join('profesor_asignatura', 'profesor_asignatura.id_asignatura', '=', 'publicacion.id_asignatura')
            ->where('publicacion.id_asignatura', '=', $idA[0])
            ->where('publicacion.id_grupo', '=', $idA[1])
            ->where('publicacion.id_profesor', '=', $id_usuario)
            ->where('publicacion.id_tipo_publicacion', '=', 4) 
            ->select('publicacion.id_asignatura as idmateria', 'publicacion.id as id', 'publicacion.titulo as titulo', 'publicacion.descripcion as descripcion', 'publicacion.Observacion', 'publicacion.archivo', 'publicacion.url','publicacion.created_at')
            ->groupBy('publicacion.id')
            ->orderBy('publicacion.created_at', 'desc')
            ->paginate(10);
      //----------Agregador por todos-----------------------
      $capsulasT = DB::table('publicacion')
            ->join('profesor_asignatura', 'profesor_asignatura.id_asignatura', '=', 'publicacion.id_asignatura')
            ->join('profesor', 'profesor_asignatura.id_profesor', '=', 'profesor.id')
            ->join('users', 'profesor.id_usuario', '=', 'users.id')
            ->join('grupo', 'publicacion.id_grupo', '=', 'grupo.id')            
            ->where('publicacion.id_asignatura', '=', $idA[0])
            ->where('publicacion.id_profesor', '!=', $id_usuario)            
            ->where('publicacion.id_tipo_publicacion', '=', 4) 
            ->select('publicacion.id_asignatura as idmateria', 'publicacion.id as id', 'publicacion.titulo as titulo', 'publicacion.descripcion as descripcion', 'publicacion.Observacion', 'publicacion.archivo', 'publicacion.url','publicacion.created_at','users.name as n_profesor','grupo.descripcion as grupo')
            ->groupBy('publicacion.id')
            ->orderBy('publicacion.created_at', 'desc')
            ->paginate(10);      
      //----------------------------------------------------
      return view('admin.capsulas.index')->with('capsulas', $capsulas)->with('capsulasT', $capsulasT)->with('asignatura', $asignatura)->with('grupo', $grupo);    		
    }

    /*
    * @return Response
    */
    public function create($id)
    {
      $gId=explode(',', $id);
      return view('admin.capsulas.create')->with('id_a', $gId[0])->with('id_g', $gId[1]);
    }   
     /*
     * @return Response
     */
    public function store(capsulaRequest $request)
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
            return redirect('admin/capsulas/create/'.$request->id_asignatura.','.$request->id_grupo)->withErrors($validator)->withInput();
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

        $capsulas = new capsulas($request->all());
        $capsulas->archivo = $name;
        $capsulas->url = $urltube;
        $capsulas->save();
        Flash::success('La guía ' . $capsulas->titulo . ' ha sido guardado con éxito!');
        return redirect("admin/capsulas/" . $request->id_asignatura.','.$request->id_grupo);   
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
    public function edit($id)
    {
    	//dd($user);
    	$capsulas = capsulas::find($id);
    	return view('admin.capsulas.edit')->with('capsula', $capsulas);        
    }

    /**
     * Actualiza la empresa deseada.
     *
     * @param  int $id
     * @return Response
     */
     public function update(request $request,$id)
    {

        //-----------------Valor archivo------------------------------------------------        
        if($request->file('archivo')==null){
            $name = $request->archivo2;           
        }else{
            $ruta = "public";
            $name = $request->file('archivo')->getClientOriginalName();
            $request->file('archivo')->storePubliclyAs($ruta,$name);    
        }        
        //------------------------------------------------------------------------------

        //-----------------Crear un enlace embebido de youtube---------------------------
        $urltube = '#';
        if (strpos($request->url, 'youtube.com/watch?v=') !== false || strpos($request->url, 'youtube.com/embed/') !== false) {
          $urltube = str_replace ( 'watch?v=' , 'embed/' , $request->url);
        }        
        //-------------------------------------------------------------------------------

        $id_asignatura = DB::select('select id_asignatura from publicacion where id='.$id);
        $id_grupo = DB::select('select id_grupo from publicacion where id='.$id);        

        $capsulas= capsulas::find($id);
        $capsulas->titulo = $request->titulo;
        $capsulas->descripcion = $request->descripcion;
        $capsulas->archivo = $name;
        $capsulas->url = $urltube;
        $capsulas->Observacion = $request->Observacion;
        $capsulas->save();

        Flash::warning('La cápsula ' . $capsulas->titulo . ' ha  sido editado con exito!');
        return redirect("admin/capsulas/" . $id_asignatura[0]->id_asignatura.','.$id_grupo[0]->id_grupo);
    }

    /**
     * Elimina una empresa del sistema.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $id_asignatura = DB::select('select id_asignatura from publicacion where id ='.$id);
        $id_grupo = DB::select('select id_grupo from publicacion where id ='.$id);
          
        $capsula= capsulas::find($id);
        //dd($user);   lo muestra si lo consigue
        $capsula->delete();
        Flash::error('El capsula '  . $capsula->titulo .  ' ha sido borrado de forma exitosa!' );
        return redirect("admin/capsulas/" . $id_asignatura[0]->id_asignatura.','.$id_grupo[0]->id_grupo);
    }
    public function descargar($url){
        return response()->download(storage_path('app\\public\\'.$url));
    }
}