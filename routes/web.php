<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();  

/*Route::get('/home', 'HomeController@index')->name('home');*/

/*Route::get('articulos', function () {
    echo "seccion articulos";;
}); */

//Route::group(['prefix' => 'articulos'], function(){

/*Route::get('view/{id}', [
      'uses'  => 'TestController@view',
      'as'    => 'articulovista'


	]);  */

    Route::get('/front',[
        'uses'  =>  'FrontController@index',
        'as'    =>   'front.index'        
        ]);
    //Ruta usada para actualizar el calendario zabuto
    Route::get('/front/calendario',[

        'uses'  =>  'FrontController@calendario',
        'as'    =>   'front.calendario'
        
        ]);
    //------------------------------------------
    Route::get('/front/menu',[

        'uses'  =>  'FrontController@menu',
        'as'    =>   'front.menu'
        
        ]);
	Route::group(['prefix' => 'admin'], function(){


    Route::group(['middleware' => 'admin'], function(){

   //------------- Rutas Modulo Admin-----------

    Route::resource('users','UsuariosController');    
    Route::get('users/{id}/destroy',[
           'uses'  =>  'UsuariosController@destroy',
            'as'    =>   'admin.users.destroy'
        ]);
   

       Route::get('users/{id}/listAsignaturas',[
            'uses'  =>  'UsuariosController@listAsignaturas',
            'as'    =>   'UsuariosController.listAsignaturas'
        ]);

        Route::get('users/{id}/addProfesorCurso/{id_asignatura}/{id_curso}',[
            'uses'  =>  'UsuariosController@addProfesorCurso',
            'as'    =>   'UsuariosController.addProfesorCurso'
        ]);

        Route::get('users/{id}/deleteProfesorCurso/{id_asignatura}/{id_curso}',[
            'uses'  =>  'UsuariosController@deleteProfesorCurso',
            'as'    =>   'UsuariosController.deleteProfesorCurso'
        ]);
});

    Route::resource('asignatura_admin', 'Asignatura_adminController');

    Route::get('asignatura_admin/{id}/destroy',[
        'uses'  =>  'Asignatura_adminController@destroy',
        'as'    =>   'asignatura_admin.destroy' 

        ]);

    Route::resource('cursos', 'cursosController');
    Route::get('cursos/{id}/destroy',[
        'uses'  =>  'cursosController@destroy',
        'as'    =>   'cursos.destroy' 

        ]);

	Route::resource('asignaturas', 'AsignaturaController');
    //Ruta usada para generar el nesten dropdown
    Route::get('asignaturas/ajax/{id}',array('as'=>'asignaturas.ajax','uses'=>'AsignaturaController@grupoAjax'));	

    //Route::resource('cursos', 'CursosController');    
    //-----------------------------------------------------
    //-----------------------------------------------------
    Route::get('videos/{id}',[
        'uses'  =>  'VideosController@index',
        'as'    =>   'videos.index'
    ]);
    Route::get('videos/create/{id}',[
        'uses'  =>  'VideosController@create',
        'as'    =>   'videos.create'
    ]);
    Route::get('videos/edit/{id}',[
        'uses'  =>  'VideosController@edit',
        'as'    =>   'videos.edit'
    ]);
    Route::get('videos/destroy/{id}',[
        'uses'  =>  'VideosController@destroy',
        'as'    =>   'videos.destroy'
    ]);
    Route::get('videos/descargar/{url}',[
        'uses'  =>  'VideosController@descargar',
        'as'    =>   'videos.descargar'
    ]);
    Route::resource('videos', 'VideosController');
    //------------------------------------------------------
    //------------------------------------------------------
    Route::get('capsulas/{id}',[
        'uses'  =>  'CapsulasController@index',
        'as'    =>   'capsulas.index'
    ]);
    Route::get('capsulas/create/{id}',[
        'uses'  =>  'CapsulasController@create',
        'as'    =>   'capsulas.create'
    ]);
    Route::get('capsulas/edit/{id}',[
        'uses'  =>  'CapsulasController@edit',
        'as'    =>   'capsulas.edit'
    ]);
    Route::get('capsulas/destroy/{id}',[
        'uses'  =>  'CapsulasController@destroy',
        'as'    =>   'capsulas.destroy'
    ]);
    Route::get('capsulas/descargar/{url}',[
        'uses'  =>  'CapsulasController@descargar',
        'as'    =>   'capsulas.descargar'
    ]);
    Route::resource('capsulas', 'CapsulasController');
    //------------------------------------------------------
    //------------------------------------------------------
    Route::get('materialhs/{id}',[
        'uses'  =>  'MaterialhsController@index',
        'as'    =>   'materialhs.index'
    ]);
    Route::get('materialhs/create/{id}',[
        'uses'  =>  'MaterialhsController@create',
        'as'    =>   'materialhs.create'
    ]);
    Route::get('materialhs/edit/{id}',[
        'uses'  =>  'MaterialhsController@edit',
        'as'    =>   'materialhs.edit'
    ]);
    Route::get('materialhs/destroy/{id}',[
        'uses'  =>  'MaterialhsController@destroy',
        'as'    =>   'materialhs.destroy'
    ]);
    Route::get('materialhs/descargar/{url}',[
        'uses'  =>  'MaterialhsController@descargar',
        'as'    =>   'materialhs.descargar'
    ]);
    Route::resource('materialhs', 'MaterialhsController'); 
    //------------------------------------------------------
    //------------------------------------------------------
    Route::get('materialcs/{id}',[
        'uses'  =>  'MaterialcsController@index',
        'as'    =>   'materialcs.index'
    ]);
    Route::get('materialcs/create/{id}',[
        'uses'  =>  'MaterialcsController@create',
        'as'    =>   'materialcs.create'
    ]);
    Route::get('materialcs/edit/{id}',[
        'uses'  =>  'MaterialcsController@edit',
        'as'    =>   'materialcs.edit'
    ]);
    Route::get('materialcs/destroy/{id}',[
        'uses'  =>  'MaterialcsController@destroy',
        'as'    =>   'materialcs.destroy'
    ]);
    Route::get('materialcs/descargar/{url}',[
        'uses'  =>  'MaterialcsController@descargar',
        'as'    =>   'materialcs.descargar'
    ]);
    Route::resource('materialcs', 'MaterialcsController'); 
    //------------------------------------------------------
    //------------------------------------------------------
    Route::get('guias/{id}',[
        'uses'  =>  'GuiasController@index',
        'as'    =>   'guias.index'
    ]);
    Route::get('guias/create/{id}',[
        'uses'  =>  'GuiasController@create',
        'as'    =>   'guias.create'
    ]);
    Route::get('guias/edit/{id}',[
        'uses'  =>  'GuiasController@edit',
        'as'    =>   'guias.edit'
    ]);
    Route::get('guias/destroy/{id}',[
        'uses'  =>  'GuiasController@destroy',
        'as'    =>   'guias.destroy'
    ]);
    Route::get('guias/descargar/{url}',[
        'uses'  =>  'GuiasController@descargar',
        'as'    =>   'guias.descargar'
    ]);
    Route::resource('guias', 'GuiasController');    
    //------------------------------------------------------
    //Esta ruta es útil para datable, sin embargo, fué desechada ya que daba conflicto por el uso de librerías de query
    /*Route::get('proyectos/getproyectos/{id}',[
        'uses'  =>  'ProyectosController@getProyectos',
        'as'    =>  'proyectos.getproyectos'
    ]);*/
    Route::get('proyectos/{id}',[
        'uses'  =>  'ProyectosController@index',
        'as'    =>   'proyectos.index'
    ]);
    Route::get('proyectos/create/{id}',[
        'uses'  =>  'ProyectosController@create',
        'as'    =>   'proyectos.create'
    ]);
    Route::get('proyectos/descargar/{url}',[
        'uses'  =>  'ProyectosController@descargar',
        'as'    =>   'proyectos.descargar'
    ]);
    Route::get('proyectos/destroy/{id}',[
        'uses'  =>  'ProyectosController@destroy',
        'as'    =>   'proyectos.destroy'
    ]);    
    Route::resource('proyectos', 'ProyectosController',['except'=>[
        'index','create'
    ]]);
    //------------------------------------------------------
    //Route::resource('videos', 'VideosController');    

	Route::get('categorias/{id}/destroy',[
            'uses'  =>  'CategoriasController@destroy',
            'as'    =>   'categorias.destroy'
            ]);
	Route::resource('tags', 'TagsController');
	Route::get('tags/{id}/destroy',[
            'uses'  =>  'tagsController@destroy',
            'as'    =>   'tags.destroy'
            ]);
	Route::resource('articulos', 'ArticulosController');
    Route::get('articulos/{id}/destroy',[
            'uses'  =>  'articulosController@destroy',
            'as'    =>   'articulos.destroy'
            ]);

    Route::get('imagenes',[

		'uses'  =>  'ImagenesController@index',
		'as'    =>   'admin.imagenes.index'
		
		]);

Route::get('home', 'HomeController@index')->name('home');

Route::get('access', function(){

echo "hola m";

})->middleware('admin');

Auth::routes();


/*Route::get('admin/auth/login', [

    'uses' =>   'Auth/LoginController@showLoginForm',
    'as'   =>    'admin.auth.login'

    ]);  */


});