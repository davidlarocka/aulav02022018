@extends('template_n.main')
@section('title', 'Modificar cápsula')

@section('content')

<h3 class="title">Editar cápsula</h3>

<div class="tabla">
{!! Form::open(['route' => ['capsulas.update', $capsula], 'method' => 'PUT','files' => 'true']) !!}

 <div class="form-group">

    {!! Form::label('titulo','Título')!!}
    {!! Form::text('titulo',$capsula->titulo,['class' => 'form-control', 'placeholder' => 'Título','required'])!!}

    {!! Form::label('descripcion','Descripción')!!}
    {!! Form::text('descripcion',$capsula->descripcion,['class' => 'form-control', 'placeholder' => 'Descripción','required'])!!}

    {!! Form::label('archivo','Archivo almacenado: '.$capsula->archivo)!!}
    <input type="file" class="form-control-file" name="archivo" placeholder="Archivo" value="{{$capsula->archivo}}">
    <input type="hidden" class="form-control" name="archivo2"value="{{$capsula->archivo}}">

    {!! Form::label('url','Vídeo')!!}
    {!! Form::text('url',$capsula->url,['class' => 'form-control', 'placeholder' => 'Vídeo','required'])!!}

    {!! Form::label('observacion','Observación')!!}
    {!! Form::text('Observacion',$capsula->Observacion,['class' => 'form-control', 'placeholder' => 'Observación','required'])!!}

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