@extends('template_n.main')
@section('title')
  Agregar proyecto
@endsection

@section('content')

<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading" data-toggle="collapse" href="#enc_proyecto">
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
                <label class="col-lg-3 control-label">Archivo</label> 
                <div class="col-lg-3"> 
                  <input type="file" class="form-control" name="archivo" /> 
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
                  <input type="text" class="form-control" name="descripcion" id="descripcion" />
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-9 col-lg-offset-3">
                  <button type="submit" class="btn btn-success left">Editar</button>
                </div> 
              </div> 
          </div>       
        {!! Form::close() !!}                
      <!--Fin-->
      </div>
    </div>
  </div>
</div>
<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading" data-toggle="collapse" href="#alumnos">
      <h4 class="panel-title" >
        <a>Listado de alumnos</a>
      </h4>
    </div>
    <div id="alumnos" class="panel-collapse collapse">
      <div class="panel-body">
      <!--Inicio tabla de alumnos en el proyecto-->
        
      <!--Fin-->
      </div>
    </div>
  </div>
</div>



<!--<div class="title">
  <h3 class="title">Agregar proyecto</h3>
</div>-->
<!--Inicio del formulario de proyectos-->

<!--Fin del formulario de proyectos-->
@endsection