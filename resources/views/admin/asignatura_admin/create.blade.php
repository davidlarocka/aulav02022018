@extends('template_n.main')
@section('title')
Crear Asignatura
@endsection

@section('content')

{!! Form::open(['route' => 'asignatura_admin.store', 'method' => 'POST']) !!}


<div class="title">
<h3 class="title">Agregar Asignatura </h3>
</div>
  
  <div class="tabla">
  <div class="form-group">

     {!! Form::label('descripcion','Descripcion Asignatura')!!}
     {!! Form::text('descripcion',null,['class' => 'form-control', 'placeholder' => 'Asignatura','required'])!!}

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