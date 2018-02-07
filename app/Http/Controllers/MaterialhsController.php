<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Requests\MaterialhRequest;
use App\materialhs;
use DB;
use Illuminate\Support\Facades\Auth;
use Validator;

class MaterialhsController extends Controller
{
    public function index($id)
    {   

      $idA=explode(',', $id);

      $id_usuario = Auth::id();
      //$asignatura = materialhs::find($id);
      $asignatura = DB::table('asignatura')->where('id', '=', $idA[0])->get();
      $grupo = DB::table('grupo')->where('id', '=', $idA[1])->get();      

      $materialhs = DB::table('publicacion')
            ->join('profesor_asignatura', 'profesor_asignatura.id_asignatura', '=', 'publicacion.id_asignatura')
            ->where('publicacion.id_asignatura', '=', $idA[0])
            ->where('publicacion.id_grupo', '=', $idA[1])
            ->where('publicacion.id_profesor', '=', $id_usuario)
            ->where('publicacion.id_tipo_publicacion', '=', 5) 
            ->select('publicacion.id_asignatura as idmateria', 'publicacion.id as id', 'publicacion.titulo as titulo', 'publicacion.descripcion as descripcion', 'publicacion.Observacion', 'publicacion.archivo', 'publicacion.url','publicacion.created_at')
            ->groupBy('publicacion.id')
            ->orderBy('publicacion.created_at', 'desc')
            ->paginate(10);

      //----------Agregador por todos-----------------------
      $materialhsT = DB::table('publicacion')
            ->join('profesor_asignatura', 'profesor_asignatura.id_asignatura', '=', 'publicacion.id_asignatura')
            ->join('profesor', 'profesor_asignatura.id_profesor', '=', 'profesor.id')
            ->join('users', 'profesor.id_usuario', '=', 'users.id')
            ->join('grupo', 'publicacion.id_grupo', '=', 'grupo.id')            
            ->where('publicacion.id_asignatura', '=', $idA[0])
            ->where('publicacion.id_profesor', '!=', $id_usuario)            
            ->where('publicacion.id_tipo_publicacion', '=', 5) 
            ->select('publicacion.id_asignatura as idmateria', 'publicacion.id as id', 'publicacion.titulo as titulo', 'publicacion.descripcion as descripcion', 'publicacion.Observacion', 'publicacion.archivo', 'publicacion.url','publicacion.created_at','users.name as n_profesor','grupo.descripcion as grupo')
            ->groupBy('publicacion.id')
            ->orderBy('publicacion.created_at', 'desc')
            ->paginate(10);      
      //----------------------------------------------------
      return view('admin.materialhs.index')->with('materialhs', $materialhs)->with('materialhsT', $materialhsT)->with('asignatura', $asignatura)->with('grupo', $grupo);        
    }

    /*
    * @return Response
    */
    public function create($id)
    {
      $gId=explode(',', $id);
      return view('admin.materialhs.create')->with('id_a', $gId[0])->with('id_g', $gId[1]);
    }   
     /*
     * @return Response
     */
    public function store(materialhRequest $request)
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
            return redirect('admin/materialhs/create/'.$request->id_asignatura.','.$request->id_grupo)->withErrors($validator)->withInput();
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

        $materialhs = new materialhs($request->all());
        $materialhs->archivo = $name;
        $materialhs->url = $urltube;
        $materialhs->save();
        Flash::success('La guía ' . $materialhs->titulo . ' ha sido guardado con éxito!');
        return redirect("admin/materialhs/" . $request->id_asignatura.','.$request->id_grupo);   
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
      $materialhs = materialhs::find($id);
      return view('admin.materialhs.edit')->with('materialh', $materialhs);        
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

        $materialhs= materialhs::find($id);
        $materialhs->titulo = $request->titulo;
        $materialhs->descripcion = $request->descripcion;
        $materialhs->archivo = $name;
        $materialhs->url = $urltube;
        $materialhs->Observacion = $request->Observacion;
        $materialhs->save();

        Flash::warning('La cápsula ' . $materialhs->titulo . ' ha  sido editado con exito!');
        return redirect("admin/materialhs/" . $id_asignatura[0]->id_asignatura.','.$id_grupo[0]->id_grupo);
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
          
        $materialh= materialhs::find($id);
        //dd($user);   lo muestra si lo consigue
        $materialh->delete();
        Flash::error('El materialh '  . $materialh->titulo .  ' ha sido borrado de forma exitosa!' );
        return redirect("admin/materialhs/" . $id_asignatura[0]->id_asignatura.','.$id_grupo[0]->id_grupo);
    }
    public function descargar($url){
        return response()->download(storage_path('app\\public\\'.$url));
    }
}