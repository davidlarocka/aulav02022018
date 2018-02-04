@extends('template_n.main')
@section('title')
Crear Usuario
@endsection

@section('content')

<h3 class="titulo">Editar Usuarios </h3>

<div class="tabla">


{!! Form::open(['route' => ['users.update',$user], 'method' => 'PUT']) !!}
<!--{!! Form::open(['method' => 'PATCH', 'action' => ['UsuariosController@update', $user->id], 'files' => true]) !!} -->

  
  @if ($user->type  == 'admin')
    <center>
     <img src="{{ URL::to('/') }}/images_n/admin_icon.png" style="width: 100px" /><br/><br/>
      <a class="btn btn-danger"> Administrador</a>
      <br/>
     </center> 
  @elseif ($user->type  == 'profesor')
      <center>
       <img src="{{ URL::to('/') }}/images_n/profesor_icon.png" style="width: 100px" /><br/><br/>
        <a class="btn btn-info"> Profesor</a>
        <br/>
     </center>
  @else
      <center>
     <img src="{{ URL::to('/') }}/images_n/alumno_icon.png" style="width: 100px" /><br/><br/>
      <a class="btn btn-success"> Alumno</a>
      <br/>
     </center>
  @endif
 
  <div class="form-group">

     {!! Form::label('name','Nombre')!!}
     {!! Form::text('name', $user->name,['class' => 'form-control', 'placeholder' => 'Nombre Completo','required'])!!}

  </div> 

  <div class="form-group">

     {!! Form::label('email','Correo Electronico')!!}
     {!! Form::text('email',$user->email,['class' => 'form-control', 'placeholder' => 'example@gmail.com','required'])!!}

  </div> 


  <div class="form-group">

  		{!! Form::label('type','Cambiar tipo de usuario') !!}
      {!! Form::select('type', ['alumno' => 'alumno', 'profesor' => 'profesor', 'admin' => 'Administrador'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción..', 'required']) !!}
  	

  </div>

  <div align="right">
  	
  	{!! Form::submit('Editar', ['class' => 'btn btn-success'] )!!}

  </div>

</div>
 <!-- <div>
  <a href="" class="btn btn-success">boton bootstrap</a>
  </div> -->
{!! Form::close() !!}

@if ($user->type  == 'profesor')
    Listado de asignaturas:
      <table class="table">
      <th>Asignatura</th>
      <th>Curso</th>
      @foreach($asignaturas as $asignatura)
          <tr>
            <td>{{ $asignatura->nombre_asig }}</td>
            <td>{{ $asignatura->curso }}</td>         
          </tr>  
      @endforeach
      </table>

    <a  class="btn btn-success" href="listAsignaturas">Agregar asignaturas</a>
  @endIf

  @if ($user->type  == 'alumno')
    Curso
      <table class="table">
      <th>Este alumno está inscrito en el curso:</th>
         
         @if (count ($cursoAlumno) > 0) 
          @foreach($cursoAlumno as $row)
           
              <tr>
                <td>{{ $row->descripcion }}</td>
                        
              </tr>
            
         @endforeach 
        @else
          <tr>
                <td>Sin curso asignado</td>
                        
              </tr>

        @endIf  
      </table>

      <b>Cambiar Curso: </b>
      <select id="curso_alumno" >
      @foreach($cursos as $curso)
          <option value="{{ $curso->id }}">
            {{ $curso->descripcion }}     
          </option>  
      @endforeach
    </select>

    <button id="guardar_curso" class="btn btn-success">Guardar Curso</button>
  @endIf


<script type="text/javascript">
  
  $('#guardar_curso').click(function(e) {
   location.href = "{{ URL::to('/') }}/admin/users/"+ {{ $user->id }}+"/"+  $('#curso_alumno').val() + "/saveCurso";
});
</script>

@endsection
 