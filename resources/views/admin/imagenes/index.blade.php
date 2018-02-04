@extends('template_n.main')

@section('title', 'Listado  de Imagenes')

@section('content')


<div class="row">

    @foreach($imagenes as $imagen)
      <div class="col-md-4">
      	 <div class="panel panel-default">
 			   <div class="panel-body">
     				<img src="http://localhost/pruebita/public/images_n/articulos/{{ $imagen->nombre }}"  class="img-responsive" />
  			   </div>
  		   <div class="panel-footer">{{ $imagen->articulo->titulo }}</div>
	   </div>
    </div>
    @endforeach
</div>

 {{ $imagenes->render() }}
@endsection