<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Requests\videoRequest;
use App\videos;
use DB;
use Illuminate\Support\Facades\Auth;

class VideosController extends Controller
{
    public function index($id)
    {   
    	$id_usuario = Auth::id();
    	//$asignatura = videos::find($id);
        $asignatura = DB::table('asignatura')->where('id', '=', $id)->get();
    	$videos = DB::select('select a.id as idmateria,p.id as id, p.titulo as titulo, p.descripcion as descripcion, p.Observacion, p.archivo, p.url  from asignatura a, publicacion p, profesor_asignatura pa where '.$id.'=pa.id_asignatura and a.id = '.$id.' and p.id_profesor='.$id_usuario.' and p.id_tipo_publicacion = 3 group by p.id');
        return view('admin.videos.index')->with('videos', $videos)->with('asignatura', $asignatura);    		
    }

    /*
    * @return Response
    */
    public function create($id)
    {
       return view('admin.videos.create')->with('id', $id);
    }   
     /*
     * @return Response
     */
    public function store(VideoRequest $request)
    {
         $ruta = "public";

        $name = $request->file('url')->getClientOriginalName();

        $ext = $request->file('url')->getClientOriginalExtension();

        $request->file('url')->storePubliclyAs($ruta,$name);                

        $videos = new videos($request->all());
        $videos->url = $name;
        $videos->archivo = $ext;
        $videos->save();
        Flash::success('La guía ' . $videos->titulo . ' ha sido guardado con éxito!');
        return redirect("admin/videos/" . $request->id_asignatura);  
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
    	$videos = videos::find($id);
    	return view('admin.videos.edit')->with('video', $videos);        
    }

    /**
     * Actualiza la empresa deseada.
     *
     * @param  int $id
     * @return Response
     */
     public function update(request $request,$id)
    {

        $id_asignatura = DB::select('select id_asignatura from publicacion where id='.$id);
        $videos= videos::find($id);
        $videos->titulo = $request->titulo;
        $videos->descripcion = $request->descripcion;
        $videos->Observacion = $request->Observacion;
        $videos->save();

        Flash::warning('El vídeo ' . $videos->titulo . ' ha  sido editado con exito!');
        return redirect("admin/videos/" . $id_asignatura[0]->id_asignatura);
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
        $video= videos::find($id);
        //dd($user);   lo muestra si lo consigue
        $video->delete();
        Flash::error('El video '  . $video->titulo .  ' ha sido borrado de forma exitosa!' );
        return redirect("admin/videos/" . $id_asignatura[0]->id_asignatura);
    }
    public function descargar($url){
        return response()->download(storage_path('app\\public\\'.$url));
    }
}