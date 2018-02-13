@extends('template_n.main')
@section('title')
Agregar asignaturas
@endsection

@section('content')

<h3>Listado de asignaturas para este profesor:</h3>
  <table class="table">
  <th>Asignatura</th>
  <th>Curso</th>
  @foreach($asignaturasProfesor as $asignatura)
      <tr>
        <td>{{ ucfirst($asignatura->nombre_asig) }}</td>
        <td>{{ $asignatura->curso }}</td>    
        <td>
          <a href="{{ URL::to('/') }}/admin/users/{{ $asignatura->idProfesor  }}/deleteProfesorCurso/{{ $asignatura->idAsignatura }}/{{ $asignatura->idGrupo}}">Borrar </a>
        </td>     
      </tr>  
  @endforeach
  </table>

<table class="table">
  <th>
      <select name="asignaturas" id="asignaturas">
      <!--<select id="id_asignatura">-->
      <option value="" selected>Seleccione una asignatura...</option>
      @foreach($asignaturasTodas as $asignatura)        
          <option value="{{ $asignatura->id }}">
              {{ ucfirst($asignatura->descripcion) }}
          </option>
       @endforeach
    </select>
  </th>

  <th>
    <select name="grupos" id="grupos"></select>          
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
          var url = 'addProfesorCurso/' +$( "#asignaturas" ).val() + "/" + $( "#grupos" ).val();
            $(location).attr('href', url);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="asignaturas"]').on('change', function() {            
            var asignaturaID = $(this).val();
            if(asignaturaID) {
                $.ajax({
                    url: '{{ URL::to('/') }}/admin/grupos/ajax/'+asignaturaID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {                        
                        $('select[name="grupos"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="grupos"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="grupos"]').empty();
            }
        });
    });
</script>