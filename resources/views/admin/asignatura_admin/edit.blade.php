@extends('template_n.main')
@section('title')
Modificar Asignatura
@endsection

@section('content')

<h3 class="title">Editar Asignatura </h3>

<div class="tabla">
{!! Form::open(['route' => ['asignatura_admin.update', $asig], 'method' => 'PUT']) !!}


 <div class="form-group">

     {!! Form::label('nombre','Nombre')!!}
     {!! Form::text('descripcion',$asig->descripcion,['class' => 'form-control', 'placeholder' => 'Nombre Asignatura','required'])!!}

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