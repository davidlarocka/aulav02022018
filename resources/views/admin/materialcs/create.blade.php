@extends('template_n.main')
@section('title')
Agregar material
@endsection

@section('content')

<a href="{!! url('admin/materialcs'); !!}/{{$id_a}},{{$id_g}}">Volver a listado de materiales habilitados</a>


<div class="title">
<h3 class="title">Agregar material</h3>
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

{!! Form::open(['route' => 'materialcs.store', 'method' => 'POST','files' => 'true']) !!}
  
  <div class="tabla">
   <div class="form-group">

    <input type="hidden" class="form-control" name="id_tipo_publicacion" value="2">

    <input type="hidden" class="form-control" name="id_asignatura" value="{{ $id_a }}">
    <input type="hidden" class="form-control" name="id_grupo" value="{{ $id_g }}">

    {!! Form::label('titulo','Título')!!}
    {!! Form::text('titulo',null,['class' => 'form-control', 'placeholder' => 'Título','required'])!!}

    {!! Form::label('descripcion','Descripción')!!}
    {!! Form::text('descripcion',null,['class' => 'form-control', 'placeholder' => 'Descripción','required'])!!}

    {!! Form::label('archivo','Seleccione el material que desea agregar. (Solo formatos: doc,csv,xlsx,xls,docx,ppt,odt,ods,odp,pdf)')!!}
    <input type="file" class="form-control-file" name="archivo" >

    {!! Form::label('url','Vídeo')!!}
    {!! Form::text('url',null,['class' => 'form-control', 'placeholder' => 'Vídeo'])!!}

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

<a href="{!! url('admin/materialcs'); !!}/{{$id_a}},{{$id_g}}">Volver a listado de materiales habilitados</a>
 

@endsection
