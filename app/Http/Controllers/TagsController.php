<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Requests\TagsRequest;
use App\Tag;
class TagsController extends Controller
{
    public function index(Request $Request)
    {
    	$tags = Tag::orderBy('id', 'DESC')->paginate(5);
       return view('admin.tags.index')->with('tags', $tags);
    }



/**
     * Muestra el formulario para crear una nueva empresa.
     *
     * @return Response
     */
    public function create()

    {

    	return view('admin.tags.create');
    }



    public function store(TagsRequest $request)
    {
    	 $tags = new Tag($request->all());
    	 $tags->save();

    	 Flash::success('El tag ' . $tags->name . ' ha sido creado con exito!' );
    	return redirect()->route('tags.index');
    }

}