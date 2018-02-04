<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Articulo;

class TestController extends Controller
{
    public  function view($id)
     {
          $articulo= Articulo::find($id);   	
          dd($articulo);
      }
}
