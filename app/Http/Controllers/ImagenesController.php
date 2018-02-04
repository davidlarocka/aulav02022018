<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imagen;
use App\Articulo;
use Laracasts\Flash\Flash;
use App\Http\Requests\ArticulosRequest;

class ImagenesController extends Controller
{

	public function index()
    {
    	$imagenes= Imagen::orderby('id','DESC')->paginate(6);
    	$imagenes->each(function($imagenes){
			$imagenes->articulo;
		});

    	//dd($imagenes);
      return view('admin.imagenes.index')
       ->with('imagenes', $imagenes);
       
    }
    
}
