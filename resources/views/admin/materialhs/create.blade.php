@extends('template_n.main')
@section('title')
Agregar Material Habilitado
@endsection

@section('content')

<a href="{!! url('admin/materialhs'); !!}/{{$id_a}},{{$id_g}}">Volver a listado de materiales habilitados</a>

<div class="title">
<h3 class="title">Agregar Material Habilitado</h3>
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

{!! Form::open(['route' => 'materialhs.store', 'method' => 'POST','files' => 'true']) !!}
  
  <div class="tabla">
   <div class="form-group">

    <input type="hidden" class="form-control" name="id_tipo_publicacion" value="3">

    <input type="hidden" class="form-control" name="id_asignatura" value="{{ $id_a }}">
    <input type="hidden" class="form-control" name="id_grupo" value="{{ $id_g }}">

    {!! Form::label('titulo','Título')!!}
    {!! Form::text('titulo',null,['class' => 'form-control', 'placeholder' => 'Título','required'])!!}

    {!! Form::label('descripcion','Descripción')!!}
    {!! Form::text('descripcion',null,['class' => 'form-control', 'placeholder' => 'Descripción','required'])!!}

    {!! Form::label('archivo','Seleccione el proyecto que desea agregar. (Solo formatos: doc,csv,xlsx,xls,docx,ppt,odt,ods,odp,pdf)')!!}
    <input type="file" class="form-control-file" name="archivo" >    

    {!! Form::label('url','Vídeo')!!}
    {!! Form::text('url',null,['class' => 'form-control', 'placeholder' => 'Vídeo'])!!}

    {!! Form::label('Observacion','Observación')!!}
    {!! Form::text('Observacion',null,['class' => 'form-control', 'placeholder' => 'Observación','required'])!!}

    <br>

    <h4>Habilitado para:</h4>    

    @foreach($alumnos as $alumno)
      <div class="form-check">
        {{ Form::checkbox('id_as[]', $alumno->id, false,['class' => 'form-check-input']) }}
        {{ Form::label($alumno->name.' '.$alumno->primer_apellido) }}
      </div>
    @endforeach

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

<a href="{!! url('admin/materialhs'); !!}/{{$id_a}},{{$id_g}}">Volver a listado de materiales habilitados</a>


@endsection