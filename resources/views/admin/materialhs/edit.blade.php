@extends('template_n.main')
@section('title', 'Modificar Material Habilitado')

@section('content')

<h3 class="title">Editar Material Habilitado</h3>

<div class="tabla">
{!! Form::open(['route' => ['materialhs.update', $materialh], 'method' => 'PUT','files' => 'true']) !!}

 <div class="form-group">

    {!! Form::label('titulo','Título')!!}
    {!! Form::text('titulo',$materialh->titulo,['class' => 'form-control', 'placeholder' => 'Título','required'])!!}

    {!! Form::label('descripcion','Descripción')!!}
    {!! Form::text('descripcion',$materialh->descripcion,['class' => 'form-control', 'placeholder' => 'Descripción','required'])!!}

    {!! Form::label('archivo','Archivo almacenado: '.$materialh->archivo)!!}
    <input type="file" class="form-control-file" name="archivo" placeholder="Archivo" value="{{$materialh->archivo}}">
    <input type="hidden" class="form-control" name="archivo2"value="{{$materialh->archivo}}">

    {!! Form::label('url','Vídeo')!!}
    {!! Form::text('url',$materialh->url,['class' => 'form-control', 'placeholder' => 'Vídeo','required'])!!}

    {!! Form::label('observacion','Observación')!!}
    {!! Form::text('Observacion',$materialh->Observacion,['class' => 'form-control', 'placeholder' => 'Observación','required'])!!}

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