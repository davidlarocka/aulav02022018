@extends('template_n.main')
@section('title')
Crear Usuario
@endsection

@section('content')


 {{ $action}}


<h3>Listado de asignaturas para este profesor:</h3>
  <table class="table">
  <th>Asignatura</th>
  <th>Curso</th>
  @foreach($asignaturasProfesor as $asignatura)
      <tr>
        <td>{{ $asignatura->nombre_asig }}</td>
        <td>{{ $asignatura->curso }}</td>    
        <td>
          <a href="{{ URL::to('/') }}/admin/users/{{ $asignatura->idProfesor  }}/deleteProfesorCurso/{{ $asignatura->idAsignatura }}/{{ $asignatura->idGrupo}}">Borrar </a>
        </td>     
      </tr>  
  @endforeach
  </table>


<table class="table">
  <th>
      <select id="id_asignatura">
      @foreach($asignaturasTodas as $asignatura)
        
          <option value="{{ $asignatura->id }}">
              {{ $asignatura->descripcion }}
          </option>         
         
       @endforeach
    </select>
  </th>

  <th>
      <select id="id_curso">
      @foreach($cursos as $curso)
        
          <option value="{{ $curso->id }}">
              {{ $curso->descripcion }}
          </option>         
         
       @endforeach
    </select>
  </th>
  <th>  
      <button type="button" id="button_add_profesor_curso" class="btn btn-success">Agregar</button> 
  </th>


</table>

@endsection
<script src="{{ URL::to('/') }}/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">

     $(document).ready(function() {
        
        $( "#button_add_profesor_curso" ).click(function() {
          var url = 'addProfesorCurso/' +$( "#id_asignatura" ).val() + "/" + $( "#id_curso" ).val();
            $(location).attr('href', url);

        });
    });
</script>
