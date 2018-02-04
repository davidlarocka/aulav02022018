@extends('template_n.main')
@section('title')
Modificar Curso
@endsection

@section('content')

<h3 class="title">Editar Cursos </h3>

<div class="tabla">
{!! Form::open(['route' => ['cursos.update', $curs], 'method' => 'PUT']) !!}


 <div class="form-group">

     {!! Form::label('nombre','Nombre')!!}
     {!! Form::text('descripcion',$curs->descripcion,['class' => 'form-control', 'placeholder' => 'Nombre Curso','required'])!!}

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