@extends('template_n.main')

@section('title', 'Listado  de Articulos')

@section('content')

<div class="row">
    <div class="col-md-8">
      <div class="row">

      @foreach($articulos as $articulo)
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-body">
      
         <a href="#"  class="thumnail">
         @foreach($articulo->imagenes as $imagen)
     				<img src="http://localhost/pruebita/public/images_n/articulos/{{ $imagen->nombre }}" />
            @endforeach
          </a>
  		   <h3 class="panel-footer">{{ $articulo->titulo }}</h3>
	           <hr>
             <i class="fa fa-folder-open-o"></i> <a href="">{{ $articulo->categoria->nombre }}</a>
             </div>
          </div>
      </div>
@endforeach
   </div>

 {!! $articulos->render() !!}}
  </div>
  <div class="col-md-4 aside">

  @include('front.partials.aside');
    
  </div>
  </div>


@endsection