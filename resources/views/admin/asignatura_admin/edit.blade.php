@extends('template_n.main')
@section('title')
Modificar Asignatura
@endsection

@section('content')

<h3 class="title">Editar Asignatura </h3>

@if(count($errors) > 0)
   <div class="alert alert-danger" role="alert">
    <ul>
      @foreach($errors->all() as $error)
      <li> {{ $error}} </li>
      @endforeach
    </ul>
   </div>

 @endif

<div class="tabla">
{!! Form::open(['route' => ['asignatura_admin.update', $asig], 'method' => 'PUT']) !!}


 <div class="form-group">

     {!! Form::label('nombre','Nombre')!!}
     {!! Form::text('descripcion',$asig->descripcion,['class' => 'form-control', 'placeholder' => 'Nombre Asignatura','required'])!!}

  </div>
  <div class="form-group">
    @foreach($grupos as $grupo)
      <div class="form-check">
        {{ Form::checkbox('grupos[]', $grupo->id, $grupo->mostrar,['class' => 'form-check-input']) }}
        {{ Form::label($grupo->descripcion) }}
      </div>
    @endforeach  
  </div> 
 
<a href="{!! url('admin/asignatura_admin'); !!}">Volver a listado de asignaturas</a> 
 
  <div align="right">
  	
  	{!! Form::submit('Editar', ['class' => 'btn btn-success'] )!!}

  </div>

 <!-- <div>
  <a href="" class="btn btn-success">boton bootstrap</a>
  </div> -->
{!! Form::close() !!}

 </div>

@endsection