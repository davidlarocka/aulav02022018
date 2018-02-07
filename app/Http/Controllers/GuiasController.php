<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Requests\GuiaRequest;
use App\guias;
use DB;
use Illuminate\Support\Facades\Auth;
use Validator;

class GuiasController extends Controller
{
    public function index($id)
    {   

      $idA=explode(',', $id);

      $id_usuario = Auth::id();
      //$asignatura = guias::find($id);
      $asignatura = DB::table('asignatura')->where('id', '=', $idA[0])->get();
      $grupo = DB::table('grupo')->where('id', '=', $idA[1])->get();      

      $guias = DB::table('publicacion')
            ->join('profesor_asignatura', 'profesor_asignatura.id_asignatura', '=', 'publicacion.id_asignatura')
            ->where('publicacion.id_asignatura', '=', $idA[0])
            ->where('publicacion.id_grupo', '=', $idA[1])
            ->where('publicacion.id_profesor', '=', $id_usuario)
            ->where('publicacion.id_tipo_publicacion', '=', 1) 
            ->select('publicacion.id_asignatura as idmateria', 'publicacion.id as id', 'publicacion.titulo as titulo', 'publicacion.descripcion as descripcion', 'publicacion.Observacion', 'publicacion.archivo', 'publicacion.url','publicacion.created_at')
            ->groupBy('publicacion.id')
            ->orderBy('publicacion.created_at', 'desc')
            ->paginate(10);

      //----------Agregador por todos-----------------------
      $guiasT = DB::table('publicacion')
            ->join('profesor_asignatura', 'profesor_asignatura.id_asignatura', '=', 'publicacion.id_asignatura')
            ->join('profesor', 'profesor_asignatura.id_profesor', '=', 'profesor.id')
            ->join('users', 'profesor.id_usuario', '=', 'users.id')
            ->join('grupo', 'publicacion.id_grupo', '=', 'grupo.id')            
            ->where('publicacion.id_asignatura', '=', $idA[0])
            ->where('publicacion.id_profesor', '!=', $id_usuario)            
            ->where('publicacion.id_tipo_publicacion', '=', 1) 
            ->select('publicacion.id_asignatura as idmateria', 'publicacion.id as id', 'publicacion.titulo as titulo', 'publicacion.descripcion as descripcion', 'publicacion.Observacion', 'publicacion.archivo', 'publicacion.url','publicacion.created_at','users.name as n_profesor','grupo.descripcion as grupo')
            ->groupBy('publicacion.id')
            ->orderBy('publicacion.created_at', 'desc')
            ->paginate(10);      
      //----------------------------------------------------
      return view('admin.guias.index')->with('guias', $guias)->with('guiasT', $guiasT)->with('asignatura', $asignatura)->with('grupo', $grupo);        
    }

    /*
    * @return Response
    */
    public function create($id)
    {
      $gId=explode(',', $id);
      return view('admin.guias.create')->with('id_a', $gId[0])->with('id_g', $gId[1]);
    }   
     /*
     * @return Response
     */
    public function store(guiaRequest $request)
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
            return redirect('admin/guias/create/'.$request->id_asignatura.','.$request->id_grupo)->withErrors($validator)->withInput();
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

        $guias = new guias($request->all());
        $guias->archivo = $name;
        $guias->url = $urltube;
        $guias->save();
        Flash::success('La guía ' . $guias->titulo . ' ha sido guardado con éxito!');
        return redirect("admin/guias/" . $request->id_asignatura.','.$request->id_grupo);   
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
      $guias = guias::find($id);
      return view('admin.guias.edit')->with('guia', $guias);        
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

        $guias= guias::find($id);
        $guias->titulo = $request->titulo;
        $guias->descripcion = $request->descripcion;
        $guias->archivo = $name;
        $guias->url = $urltube;
        $guias->Observacion = $request->Observacion;
        $guias->save();

        Flash::warning('La cápsula ' . $guias->titulo . ' ha  sido editado con exito!');
        return redirect("admin/guias/" . $id_asignatura[0]->id_asignatura.','.$id_grupo[0]->id_grupo);
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
          
        $guia= guias::find($id);
        //dd($user);   lo muestra si lo consigue
        $guia->delete();
        Flash::error('El guia '  . $guia->titulo .  ' ha sido borrado de forma exitosa!' );
        return redirect("admin/guias/" . $id_asignatura[0]->id_asignatura.','.$id_grupo[0]->id_grupo);
    }
    public function descargar($url){
        return response()->download(storage_path('app\\public\\'.$url));
    }
}