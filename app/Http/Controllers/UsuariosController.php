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
class UsuariosController extends Controller
{

    public function index()
    {

    	//dd("hola");
      $users = User::orderBy('id', 'ASC')->paginate(5); // metodo paginate indica que mostra de 5 en 5 en la vista.
       return view('admin.users.index')->with('users',$users);
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
    	//dd($request->all());   //muestra todos los valores que se envian del formulario.

        $file = $request->file('image');
        $name = 'imag_' . time() .'.' . $file->getClientOriginalExtension();
        $path = public_path() . '/images_n/users';
        $file->move($path, $name);

        $user = new User($request->all());
        $user -> password = bcrypt($request -> password);
       // dd($user);
        $user -> save();

        $image =  new img_user();
        $image->nombre =$name;
        $image->user()->associate($user);
        $image->save();
         //dd($user);
        //dd('Usuario Creado');
        Flash::success("se  ha registrado a ". $user->name ." de forma exitosa!");
        return redirect()->route('users.index');  

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

         $asignaturas = DB::select("select a.descripcion as nombre_asig, g.descripcion as curso, pa.id_asignatura as idAsignatura, pa.id_grupo as idGrupo, id_profesor as idProfesor  from profesor_asignatura pa,  asignatura a, grupo g where
            a.id= pa.id_asignatura AND
            g.id = pa.id_grupo AND id_profesor= $id");

    	return view('admin.users.edit')->with('user', $user)->with('asignaturas', $asignaturas);

        //return view('admin.users.edit')->with('user', $user);
        
    }


    public function listAsignaturas($id)
    {
        //dd($user);
        $user = User::find($id);

       $asignaturasProfesor = DB::select("select a.descripcion as nombre_asig, g.descripcion as curso, pa.id_asignatura as idAsignatura, pa.id_grupo as idGrupo, id_profesor as idProfesor  from profesor_asignatura pa,  asignatura a, grupo g where
            a.id= pa.id_asignatura AND
            g.id = pa.id_grupo AND id_profesor= $id");

       $asignaturasTodas = DB::select('select * from asignatura');

       $cursos =  DB::select('select * from grupo');
       
       $action = '';
        return view('admin.users.listAsignaturas')->with('user', $user)->with('asignaturasProfesor', $asignaturasProfesor)->with('asignaturasTodas', $asignaturasTodas)->with('cursos', $cursos)->with('action', $action);
        
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

}
