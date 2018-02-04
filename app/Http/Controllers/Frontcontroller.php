<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Http\Request;
use App\Imagen;
use App\Articulo;
use App\Categoria;
use DB;
use Illuminate\Support\Facades\Auth;

class Frontcontroller extends Controller
{
    public function index()

    {
    	$articulos= Articulo::orderBy('id','Desc')->paginate(5);
    	$articulos->each(function ($articulos){
    		$articulos->categoria;
    		$articulos->imagenes;    		
    	});
    	//($articulos);
    	return view('front.index')
    		->with('articulos', $articulos);

    }

    public function calendario(){
    $jCalendario ='[
        {
            "date":"2017-01-10",
            "badge":true,
            "title":"Proyecto",
            "body":"<p class=\"lead\">Proyecto<\/p><p>de los muchachos<\/p>",
            "footer":"Bazingaaaaa",
            "classname":"purple-event"
        },
        {
            "date":"2017-01-02",
            "badge":true,
            "title":"Proyecto",
            "body":"<p class=\"lead\">Proyecto<\/p><p>de los muchachos<\/p>",
            "footer":"Bazingaaaaa",
            "classname":"purple-event"
        }
    ]';
        return $jCalendario;
    }

}
