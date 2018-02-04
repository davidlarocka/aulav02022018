@extends('template_n.main')
@section('title')
Crear Categoria
@endsection

@section('content')

{!! Form::open(['route' => 'categorias.store', 'method' => 'POST']) !!}


<div class="titulo">
<h3 class="title">Agregar Categoria </h3>
</div>
  
  <div class="tabla">
  <div class="form-group">

     {!! Form::label('nombre','Nombre')!!}
     {!! Form::text('nombre',null,['class' => 'form-control', 'placeholder' => 'Nombre Categoria','required'])!!}

  </div>

  
 
  <div align="right">
  	
  	{!! Form::submit('Registrar', ['class' => 'btn btn-success'] )!!}

  </div>

  </div> 

 <!-- <div>
  <a href="" class="btn btn-success">boton bootstrap</a>
  </div> -->
{!! Form::close() !!}

 

@endsection