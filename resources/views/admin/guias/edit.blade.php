@extends('template_n.main')
@section('title', 'Modificar guía')

@section('content')


<h3 class="title">Editar guías</h3>

<div class="tabla">
{!! Form::open(['route' => ['guias.update', $guia], 'method' => 'PUT','files' => 'true']) !!}

 <div class="form-group">

    {!! Form::label('titulo','Título')!!}
    {!! Form::text('titulo',$guia->titulo,['class' => 'form-control', 'placeholder' => 'Título','required'])!!}

    {!! Form::label('descripcion','Descripción')!!}
    {!! Form::text('descripcion',$guia->descripcion,['class' => 'form-control', 'placeholder' => 'Descripción','required'])!!}

    {!! Form::label('archivo','Archivo almacenado: '.$guia->archivo)!!}
    <input type="file" class="form-control-file" name="archivo" placeholder="Archivo" value="{{$guia->archivo}}">
    <input type="hidden" class="form-control" name="archivo2"value="{{$guia->archivo}}">

    {!! Form::label('observacion','Observación')!!}
    {!! Form::text('Observacion',$guia->Observacion,['class' => 'form-control', 'placeholder' => 'Observación','required'])!!}

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