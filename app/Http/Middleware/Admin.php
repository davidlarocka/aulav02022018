<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class Admin
{    

    public function __construct(Guard $auth)
    {

        $this->auth = $auth;

    }

      /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //if (!Auth::guest()  &&  Auth::user()->type->admin()) {
          
        if ($this->auth->user()->admin())
        {
             return $next($request);
        }
        else {

            dd("No puede");   //si quiere mostrar error usas: abort(401);
        }

       

        return redirect('/admin/home');
    }
}
