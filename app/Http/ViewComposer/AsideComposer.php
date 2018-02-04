<?php

namespace App\Http\ViewComposer;

use Illuminate\Contracts\View\View;
use App\Categoria;
use App\Tag;

class AsideComposer {

	public function compose(View $view)
	{
		$categorias = Categoria::orderBy('nombre', 'asc')->get();
		//$tags = Tag::orderBy('nombre', 'asc')->get();
		$view->with('categorias', $categorias);//->with('tags', $tags);

	}

}