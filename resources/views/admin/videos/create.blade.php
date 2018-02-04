@extends('template_n.main')
@section('title')
Agregar vídeo
@endsection

@section('content')

{!! Form::open(['route' => 'videos.store', 'method' => 'POST','files' => 'true']) !!}

<div class="title">
<h3 class="title">Agregar vídeo</h3>
</div>
  
  <div class="tabla">
   <div class="form-group">

    <input type="hidden" class="form-control" name="id_tipo_publicacion" value="3">

    <input type="hidden" class="form-control" name="id_asignatura" value="{{ $id }}">

    {!! Form::label('titulo','Título')!!}
    {!! Form::text('titulo',null,['class' => 'form-control', 'placeholder' => 'Título','required'])!!}

    {!! Form::label('descripcion','Descripción')!!}
    {!! Form::text('descripcion',null,['class' => 'form-control', 'placeholder' => 'Descripción','required'])!!}

    {!! Form::label('url','Seleccione el vídeo que desea agregar')!!}
    <input type="file" class="form-control" name="url" >

    {!! Form::label('Observacion','Observación')!!}
    {!! Form::text('Observacion',null,['class' => 'form-control', 'placeholder' => 'Observación','required'])!!}

    <input type="hidden" class="form-control" name="id_profesor" value="{{ Auth::id() }}">

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
