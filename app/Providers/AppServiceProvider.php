<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Schema::defaultStringLength(191);
        $tipo_usuario = 'alumno';
        $id_usuario = Auth::id();
        $profesor = DB::table('profesor')->where('id_usuario','=',$id_usuario);
        if (! is_null($tipo_usuario)) {
            # code...
            $tipo_usuario = 'profesor';
        }

        // Variable que se comparte con todas las vistas
        View::share('tipo_usuario', $tipo_usuario); 
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
