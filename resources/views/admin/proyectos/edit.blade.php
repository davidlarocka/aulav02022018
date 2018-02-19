@extends('template_n.main')
@section('title', 'Modificar proyecto')

@section('content')

<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading" data-toggle="collapse" href="#enc_proyecto" style="cursor:pointer">
      <h4 class="panel-title" >
        <a>Actualización de proyecto</a>
      </h4>
    </div>
    <div id="enc_proyecto" class="panel-collapse collapse">
      <div class="panel-body">
      <!--Inicio del formulario de proyectos-->
      {!! Form::open(['route' => ['proyectos.update', $proyecto], 'method' => 'PUT','files' => 'true']) !!}
            <div id="registrationForm" class="form-horizontal mitad"> 
              <div class="form-group">
                <label class="col-lg-3 control-label">Nombre del proyecto</label>
                <div class="col-lg-3">
                  <input type="text" class="form-control" name="nombre_proyecto" value="{{$proyecto->nombre_proyecto}}" required/>
                </div> 
              </div> 
              <div class="form-group"> 
                <label class="col-lg-3 control-label">Fecha de entrega</label> 
                <div class="col-lg-3"> 
                  <input type="date" class="form-control" name="fecha_entrega" value="{{$proyecto->fecha_entrega}}" required/> 
                </div> 
              </div> 
              <div class="form-group"> 
                <label class="col-lg-3 control-label">Archivo cargado: {{$proyecto->archivo}}</label> 
                <div class="col-lg-3"> 
                  <input type="file" class="form-control-file" name="archivo" value="" /> 
                </div> 
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Vídeo</label>
                <div class="col-lg-3">
                  <input type="text" class="form-control" name="url" value="{{$proyecto->url}}"/>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Descripción</label>
                <div class="col-lg-3">
                  <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{$proyecto->descripcion}}"/>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-9 col-lg-offset-3">
                  <button type="submit" class="btn btn-success left">Editar</button>
                </div> 
              </div> 
          </div>
        <!--Fin-->
      </div>
    </div>
  </div>
</div>
<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading" data-toggle="collapse" href="#alumnos" style="cursor:pointer">
      <h4 class="panel-title" >
        <a>Listado de alumnos</a>
      </h4>
    </div>
    <div id="alumnos" class="panel-collapse collapse">
      <div class="panel-body">
      <!--Inicio tabla de alumnos en el proyecto-->
      @foreach($alumnos as $alumno)
        <div class="form-check">
          {{ Form::checkbox('id_as[]', $alumno->id, $alumno->checked,['class' => 'form-check-input']) }}
          {{ Form::label($alumno->name.' '.$alumno->primer_apellido) }}
        </div>
      @endforeach
      <!--Fin-->
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}                
@endsection