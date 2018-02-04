@extends('template_n.main')
@section('title')
Crear Curso
@endsection

@section('content')

{!! Form::open(['route' => 'cursos.store', 'method' => 'POST']) !!}


<div class="title">
<h3 class="title">Agregar Curso </h3>
</div>
  
  <div class="tabla">
  <div class="form-group">

     {!! Form::label('descripcion','Descripcion Curso')!!}
     {!! Form::text('descripcion',null,['class' => 'form-control', 'placeholder' => 'Curso','required'])!!}

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