@extends('template_n.main')
@section('title')
Crear Usuario
@endsection

@section('content')

<div class="titulo">
<h3 >Crear Usuarios </h3>
</div>

<div class="tabla">
{!! Form::open(['route' => 'users.store', 'method' => 'POST','files' => true]) !!}


  <div class="form-group">


     {!! Form::label('name','Primer Nombre')!!}
     {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => ' Primer Nombre Completo','required'])!!}

  </div>

  
   <div class="form-group">


     {!! Form::label('segundo_nombre','Segundo Nombre')!!}
     {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Segundo Nombre Completo'])!!}

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

  

  <div align="right">
  	
  	{!! Form::submit('Registrar', ['class' => 'btn btn-success'] )!!}

  </div>

</div>
  

 <!-- <div>
  <a href="" class="btn btn-success">boton bootstrap</a>
  </div> -->
{!! Form::close() !!}

 

@endsection