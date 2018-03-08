@extends('template_n.main')
@section('title')
Agregar Usuario
@endsection

@section('content')

<div class="titulo">
<h3 >Agregar Usuario</h3>
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

<div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
</div>

{!! Form::open(['route' => 'users.store', 'method' => 'POST','files' => true, 'id' => 'formulario']) !!}
<fieldset>
  <div class="form-group">
    {!! Form::label('name','Primer Nombre')!!}
    {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => ' Primer Nombre Completo','required'])!!}
  </div>
  <div class="form-group">
    {!! Form::label('segundo_nombre','Segundo Nombre')!!}
    {!! Form::text('segundo_nombre',null,['class' => 'form-control', 'placeholder' => 'Segundo Nombre Completo'])!!}
  </div>
  <div class="form-group">
    {!! Form::label('primer_apellido','Primer Apellido')!!}
    {!! Form::text('primer_apellido',null,['class' => 'form-control', 'placeholder' => ' Primer Apellido','required'])!!}
  </div>  
  <div class="form-group">
    {!! Form::label('segundo_apellido','Segundo Apellido')!!}
    {!! Form::text('segundo_apellido',null,['class' => 'form-control', 'placeholder' => ' Segundo Apellido'])!!}
  </div>
  <div class="form-group"> 
    <label name="fecha_nacimiento">Fecha de nacimiento</label>
    <input type="date" class="form-control" name="fecha_nacimiento" required/> 
  </div>  
  <input type="button" name="seguir" class="next btn btn-info" value="Seguir" />
</fieldset>
<fieldset>  
  <div class="form-group">
    {!! Form::label('rut','Rut')!!}
    {!! Form::text('rut',null,['class' => 'form-control', 'placeholder' => 'Rut','required'])!!}
  </div>
  <div class="form-group">
    {!! Form::label('sexo','Genero') !!}
    {!! Form::select('sexo', ['masculino' => 'Masculino', 'Femenino' => 'Femenino'],  null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción..', 'required']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('direccion','Direccion')!!}
    {!! Form::text('direccion',null,['class' => 'form-control', 'placeholder' => 'Direccion','required'])!!}
  </div>
  <div class="form-group">
    {!! Form::label('telefono','Telefono')!!}
    {!! Form::text('telefono',null,['class' => 'form-control', 'placeholder' => 'Telefono','required'])!!}
  </div>
  <input type="button" name="ant" class="previous btn btn-default" value="Volver" />
  <input type="button" name="seguir2" class="next btn btn-info" value="Seguir" />
</fieldset>
<fieldset>  
  <div class="form-group">
    {!! Form::label('email','Correo Electronico')!!}
    {!! Form::text('email',null,['class' => 'form-control', 'placeholder' => 'example@gmail.com','required'])!!}
  </div>
  <div class="form-group">
    {!! Form::label('password','Contraseña')!!}
    {!! Form::password('password',['class' => 'form-control', 'placeholder' => '*********','required'])!!}
  </div> 
  <div class="form-group">
    {!! Form::label('type','Tipo') !!}
    {!! Form::select('type', ['alumno' => 'alumno', 'profesor' => 'profesor', 'admin' => 'Administrador'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción..', 'required']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('image','Foto') !!}
    {!! Form::file('image') !!}
  </div>
  <input type="button" name="ant2" class="previous btn btn-default" value="Anterior" />  
  <div align="right">
    {!! Form::submit('Registrar', ['class' => 'btn btn-success'] )!!}
  </div>
</fieldset>
{!! Form::close() !!}

<style type="text/css">
  #formulario fieldset:not(:first-of-type) {
    display: none;
  }
</style>
 

@endsection