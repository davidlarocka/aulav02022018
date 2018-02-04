@extends('template_n.main')
@section('title', 'Modifica vídeo')

@section('content')

<h3 class="title">Editar vídeos</h3>

<div class="tabla">
{!! Form::open(['route' => ['videos.update', $video], 'method' => 'PUT']) !!}

 <div class="form-group">

    {!! Form::label('titulo','Título')!!}
    {!! Form::text('titulo',$video->titulo,['class' => 'form-control', 'placeholder' => 'Título de vídeo','required'])!!}

    {!! Form::label('descripcion','Descripción')!!}
    {!! Form::text('descripcion',$video->descripcion,['class' => 'form-control', 'placeholder' => 'Descripción','required'])!!}

    {!! Form::label('observacion','Observación')!!}
    {!! Form::text('Observacion',$video->Observacion,['class' => 'form-control', 'placeholder' => 'Observación','required'])!!}

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