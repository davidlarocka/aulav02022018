@extends('template_n.main')
@section('title')
  Agregar proyecto
@endsection

@section('content')

@if(count($errors) > 0)
  <div class="alert alert-danger" role="alert">
    <ul>
      @foreach($errors->all() as $error)
        <li> {{ $error}} </li>
      @endforeach
    </ul>
  </div>
@endif

<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading" data-toggle="collapse" href="#enc_proyecto" style="cursor:pointer">
      <h4 class="panel-title" >
        <a>Ingreso de nuevo proyecto</a>
      </h4>
    </div>

    <div id="enc_proyecto" class="panel-collapse collapse">
      <div class="panel-body">
      <!--Inicio del formulario de proyectos-->
        {!! Form::open(['route' => 'proyectos.store', 'method' => 'POST','files' => 'true']) !!}
          <input type="hidden" name="id_asignatura" value="{{$id_a}}">
          <input type="hidden" name="id_grupo" value="{{$id_g}}">          
            <div id="registrationForm" class="form-horizontal mitad"> 
              <div class="form-group">
                <label class="col-lg-3 control-label">Nombre del proyecto</label>
                <div class="col-lg-3">
                  <input type="text" class="form-control" name="nombre_proyecto" required/>
                </div>
              </div> 
              <div class="form-group"> 
                <label class="col-lg-3 control-label">Fecha de entrega</label> 
                <div class="col-lg-3"> 
                  <input type="date" class="form-control" name="fecha_entrega" required/> 
                </div> 
              </div> 
              <div class="form-group"> 
                <label class="col-lg-3 control-label">Archivo. (Solo formatos: doc,csv,xlsx,xls,docx,ppt,odt,ods,odp,pdf)</label> 
                <div class="col-lg-3"> 
                  <input type="file" class="form-control-file" name="archivo" /> 
                </div> 
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Vídeo</label>
                <div class="col-lg-3">
                  <input type="text" class="form-control" name="url" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Descripción</label>
                <div class="col-lg-3">
                  <input type="text" class="form-control" name="descripcion" id="descripcion" required/>
                </div>
              </div>              
              <div class="form-group">
                <div class="col-lg-9 col-lg-offset-3">
                  <button type="submit" class="btn btn-success left">Publicar</button>
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
          {{ Form::checkbox('id_as[]', $alumno->id, true,['class' => 'form-check-input']) }}
          {{ Form::label($alumno->name.' '.$alumno->primer_apellido) }}
        </div>
      @endforeach
      <!--Fin-->
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}
<a href="{!! url('admin/proyectos'); !!}/{{$id_a}},{{$id_g}}">Volver a tablas de proyectos</a>
<!--Fin del formulario de proyectos-->

@endsection