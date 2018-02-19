@extends('template_n.main')
@section('title')
Crear Asignatura
@endsection

@section('content')

{!! Form::open(['route' => 'asignatura_admin.store', 'method' => 'POST']) !!}


<div class="title">
  <h3 class="title">Agregar Asignatura </h3>
</div>

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
  <div class="form-group">

     {!! Form::label('descripcion','Descripcion Asignatura')!!}
     {!! Form::text('descripcion',null,['class' => 'form-control', 'placeholder' => 'Asignatura','required'])!!}

  </div>
  <h5>Grupos a los que pertenece la asignatura</h5>  
  <div class="form-group">
    @foreach($grupos as $grupo)
      <div class="form-check">
        {{ Form::checkbox('grupos[]', $grupo->id, true,['class' => 'form-check-input']) }}
        {{ Form::label($grupo->descripcion) }}
      </div>
    @endforeach  
  </div>

  <a href="{!! url('admin/asignatura_admin'); !!}">Volver a listado de asignaturas</a> 

  <div align="right">  	
  	{!! Form::submit('Registrar', ['class' => 'btn btn-success'] )!!}
  </div>

  </div> 

 <!-- <div>
  <a href="" class="btn btn-success">boton bootstrap</a>
  </div> -->
{!! Form::close() !!} 

@endsection