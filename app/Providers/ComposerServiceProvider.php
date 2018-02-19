<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use DB;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       view::composer(['front.index'],'App\Http\ViewComposer\AsideComposer');
       //view::composer(['*'],'App\Http\ViewComposer\GlobalComposer');
        view()->composer('*', function ($view) 
        {
            $proyectos = [
                "fecha_entrega" => "",
                "nombre_proyecto" => "",
            ];

            $mes=date('m');        
            $id_usuario = Auth::id();
            //dd($id_usuario);
            $cantPro = "";            
            $proyectos = "";
            $img = "";

            if($id_usuario!=null){
                $cantPro=DB::table('proyectos')->whereMonth('fecha_entrega','=',$mes)->where('id_profesor','=',$id_usuario)->count();
                $proyectos = DB::table('proyectos')->where('id_profesor','=',$id_usuario)->get();                            
                
                $imagen = DB::table('img_user')->select('nombre')->where('user_id','=',$id_usuario)->get();
                //dd($imagen);
                if(empty($imagen[0]->nombre)){
                    //$imagen[0]->nombre = "1.png";
                    $img = "1.png";
                }else{
                    $img = $imagen = $imagen[0]->nombre;
                }                
            }
            $view->with('cantPro', $cantPro)->with('proyectos', $proyectos)->with('imagen', $img);    
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
