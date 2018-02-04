@extends('template_n.main')
@section('title')
Crear Categoria
@endsection

@section('content')

<h3 class="titulo">Editar Categoria </h3>

<div class="tabla">
{!! Form::open(['route' => ['categorias.update', $categoria], 'method' => 'PUT']) !!}


  <div class="form-group">

     {!! Form::label('nombre','Nombre')!!}
     {!! Form::text('nombre',$categoria->nombre,['class' => 'form-control', 'placeholder' => 'Nombre Categoria','required'])!!}

  </div> 
 
  <div align="right">
  	
  	{!! Form::submit('Editar', ['class' => 'btn btn-success'] )!!}

  </div>

 <!-- <div>
  <a href="" class="btn btn-success">boton bootstrap</a>
  </div> -->
{!! Form::close() !!}

 </div>

@endsection