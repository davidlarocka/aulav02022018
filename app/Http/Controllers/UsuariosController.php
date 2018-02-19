<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\User;
use App\img_user;
use DB;
use Laracasts\Flash\Flash;
use Auth;

class UsuariosController extends Controller
{

    public function index()
    {
        $alumnos = DB::table('users')->where('type','=','alumno')->orderBy('id', 'name')->paginate(5); 
        $profesores = DB::table('users')->where('type','=','profesor')->orderBy('id', 'name')->paginate(5); 
        $admins = DB::table('users')->where('type','=','admin')->orderBy('id', 'name')->paginate(5); 
                
        return view('admin.users.index')->with('alumnos',$alumnos)->with('profesores',$profesores)->with('admins',$admins);
    }


    /**
     * Muestra el formulario para crear una nueva empresa.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.users.create');
    }

    /**
     * Guarda la nueva empresa creada.
     *
     * @return Response
     */
    public function store(UsuarioRequest $request)
    {
        $file = $request->file('image');
        $name = 'imag_' . time() .'.' . $file->getClientOriginalExtension();
        $path = public_path() . '/images_n/users';
        $file->move($path, $name);

        $user = new User($request->all());
        $user -> password = bcrypt($request -> password);
        $user -> save();

        $image =  new img_user();
        $image->nombre =$name;
        $image->user()->associate($user);
        $image->save();
        //dd($user);
        //dd('Usuario Creado');
        Flash::success("se  ha registrado a ". $user->name ." de forma exitosa!");
        return redirect()->route('users.edit', $user->id); 

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
    	//dd($user);
    	$user = User::find($id);

        if ($user->type == 'alumno'){
            //buscamos el curso al cual pertenece el alumno    
            $cursoAlumno = DB::select("SELECT ag.id_alumno, g.descripcion, g.id as idGrupo FROM alumno_grupo ag, grupo g WHERE ag.id_grupo = g.id and id_alumno = $id");
            $asignaturasAlumno =  DB::select("SELECT ga.*, g.descripcion, a.descripcion as asigAlum FROM grupo_asignatura ga, grupo g, asignatura a, alumno_grupo u WHERE g.id = ga.id_grupo AND a.id= ga.id_asignatura and ga.id_grupo= u.id_grupo and u.id_alumno = $id"); 
    
        }else{

            $cursoAlumno = null;
            $asignaturasAlumno = null;
        }

         $asignaturas = DB::select("SELECT a.descripcion as nombre_asig, g.descripcion as curso, pa.id_asignatura as idAsignatura, pa.id_grupo as idGrupo, id_profesor as idProfesor  from profesor_asignatura pa,  asignatura a, grupo g where
            a.id= pa.id_asignatura AND
            g.id = pa.id_grupo AND id_profesor= $id");

         $cursos = DB::select("SELECT * from grupo");

    	return view('admin.users.edit')->with('user', $user)->with('asignaturas', $asignaturas)->with('cursoAlumno', $cursoAlumno)->with('cursos', $cursos)->with('asignaturasAlumno', $asignaturasAlumno);
       
    }    

    public function saveCurso($id, $id_curso)
    {
        //dd($user);
        //guardamos el curso para el usuario
        $save_cursoAlumno = DB::select("SELECT ag.id_alumno, g.descripcion, g.id as idGrupo FROM alumno_grupo ag, grupo g WHERE ag.id_grupo = g.id and id_alumno = $id");

        if(count($save_cursoAlumno) > 0){
            //actualizamos
            $res_save = DB::select("UPDATE alumno_grupo set id_grupo= $id_curso  WHERE id_alumno = $id");

        }else{
            //guardamos    
            $res_save = DB::select("INSERT INTO alumno_grupo(id_alumno, id_grupo) values ($id, $id_curso)");

        }

        $user = User::find($id);

        if ($user->type == 'alumno'){
            //buscamos el curso al cual pertenece el alumno    
            $cursoAlumno = DB::select("SELECT ag.id_alumno, g.descripcion, g.id as idGrupo FROM alumno_grupo ag, grupo g WHERE ag.id_grupo = g.id and id_alumno = $id");

            $asignaturasAlumno =  DB::select("SELECT ga.*, g.descripcion, a.descripcion as asigAlum FROM grupo_asignatura ga, grupo g, asignatura a, alumno_grupo u WHERE g.id = ga.id_grupo AND a.id= ga.id_asignatura and ga.id_grupo= u.id_grupo and u.id_alumno = $id");   
    
        }else{

            $cursoAlumno = null;
            $asignaturasAlumno =  null;
        }

         $asignaturas = DB::select("SELECT a.descripcion as nombre_asig, g.descripcion as curso, pa.id_asignatura as idAsignatura, pa.id_grupo as idGrupo, id_profesor as idProfesor  from profesor_asignatura pa,  asignatura a, grupo g where
            a.id= pa.id_asignatura AND
            g.id = pa.id_grupo AND id_profesor= $id");

         $cursos = DB::select("SELECT * from grupo");

        return view('admin.users.edit')->with('user', $user)->with('asignaturas', $asignaturas)->with('cursoAlumno', $cursoAlumno)->with('cursos', $cursos)->with('asignaturasAlumno', $asignaturasAlumno);       
        
    }


    public function listAsignaturas($id)
    {
        //dd($user);
        $user = User::find($id);

       $asignaturasProfesor = DB::select("select a.descripcion as nombre_asig, g.descripcion as curso, pa.id_asignatura as idAsignatura, pa.id_grupo as idGrupo, id_profesor as idProfesor  from profesor_asignatura pa,  asignatura a, grupo g where
            a.id= pa.id_asignatura AND
            g.id = pa.id_grupo AND id_profesor= $id");

       $asignaturasTodas = DB::select('select * from asignatura');

       //$cursos =  DB::select('select * from grupo');
       
       //$action = '';
       return view('admin.users.listAsignaturas')->with('user', $user)->with('asignaturasProfesor', $asignaturasProfesor)->with('asignaturasTodas', $asignaturasTodas);//->with('cursos', $cursos)->with('action', $action);
        
    }

    public function gruposAjax($id){

        $grupos = DB::table('grupo')
            ->join('grupo_asignatura','grupo.id','=','grupo_asignatura.id_grupo')            
            ->where('grupo_asignatura.id_asignatura','=',$id)
            ->pluck("grupo.descripcion as descripcion","grupo.id as id_grupo")->all();
        return json_encode($grupos);

    }

    public function addProfesorCurso($id, $id_asignatura, $id_curso)
    {
        
        $asignaturasTodas = DB::select("insert into profesor_asignatura(id_profesor, id_asignatura, id_grupo) VALUES($id, $id_asignatura, $id_curso)");
        $action = 'Guardado con exito';

        $user = User::find($id); 
        $asignaturasProfesor = DB::select("select a.descripcion as nombre_asig, g.descripcion as curso, pa.id_asignatura as idAsignatura, pa.id_grupo as idGrupo, id_profesor as idProfesor  from profesor_asignatura pa,  asignatura a, grupo g where
            a.id= pa.id_asignatura AND
            g.id = pa.id_grupo AND id_profesor= $id");

        $asignaturasTodas = DB::select('select * from asignatura');

        $cursos =  DB::select('select * from grupo');
        return redirect()->route('UsuariosController.listAsignaturas', ['id' => $id]);
    }


    public function deleteProfesorCurso($id, $id_asignatura, $id_curso)
    {
        
        $asignaturasTodas = DB::select("delete from profesor_asignatura where id_profesor = $id and id_asignatura = $id_asignatura and id_grupo= $id_curso");
        
        $action = 'Eliminado con exito';

        $user = User::find($id); 
        $asignaturasProfesor = DB::select("select a.descripcion as nombre_asig, g.descripcion as curso, pa.id_asignatura as idAsignatura, pa.id_grupo as idGrupo, id_profesor as idProfesor  from profesor_asignatura pa,  asignatura a, grupo g where
            a.id= pa.id_asignatura AND
            g.id = pa.id_grupo AND id_profesor= $id");

        $asignaturasTodas = DB::select('select * from asignatura');

        $cursos =  DB::select('select * from grupo');
        return redirect()->route('UsuariosController.listAsignaturas', ['id' => $id]);
    }

    /**
     * Actualiza la empresa deseada.
     *
     * @param  int $id
     * @return Response
     */
    public function update(request $request,$id)
    {
       //dd($request->all());
    	$user= User::find($id);
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->type = $request->type;
    	$user->save();

    	Flash::warning('El usuario ' . $user->name . ' ha  sido editado con exito!');
    	return redirect()->route('users.index');
    }

    /**
     * Elimina una empresa del sistema.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //dd($id);

        $user= User::find($id);
        //dd($user);   lo muestra si lo consigue
        $user->delete();
        Flash::error('El usuario '  . $user->name .  ' ha sido borrado de forma exitosa!' );
        return redirect()->route('users.index');
    }

     public function salir(Request $request) {
        Auth::logout();
        //return dd(Auth::logout());
        return redirect('login');
    }
}
