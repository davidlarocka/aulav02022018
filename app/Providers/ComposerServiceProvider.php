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
            $cantPro=DB::table('proyectos')->whereMonth('fecha_entrega','=',$mes)->where('id_profesor','=',$id_usuario)->count();
            $proyectos = DB::table('proyectos')->where('id_profesor','=',$id_usuario)->get();                            
            
            //dd($proyectos);
            $view->with('cantPro', $cantPro)->with('proyectos', $proyectos);    
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
