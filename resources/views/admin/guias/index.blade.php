@extends('template_n.main')

@section('title', 'Guías')

@section('content')

<!--  Buscador  -->

<!--  fin buscador  -->
<div class="title"><h3 class="title" class="">Guías de {{ ucfirst($asignatura[0]->descripcion) }} {{ $grupo[0]->descripcion }}</h3></div>
<div class="container">
  @include('flash::message')
</div>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#tabla1">Agregados por mí</a></li>
  <li><a data-toggle="tab" href="#tabla2">Otros profesores</a></li>
</ul>

<div class="tab-content">
  <div id="tabla1" class="tab-pane fade in active">
    <table class="table table table-hover">
      <thead class="table">
        <th>Título</th>
        <th>Descripción</th>
        <th>Tipo de archivo</th>
        <th>Vídeo</th>      
        <th>Observación</th>
        <th>Creado</th>     

        <tbody class="table">
         @foreach($guias as $guia)
         <tr>
             <td>{{ $guia->titulo }}</td>
            <td>{{ $guia->descripcion }}</td>
            @if (( $guia->archivo )=='')
              <td></td>            
            @else
              <td><a href="{{URL::to('/') }}/admin/guias/descargar/{{$guia->archivo }}" class="fa fa-file-text fa 4x"></a></td>            
            @endif
            @if(( $guia->url )=='#')
              <td></td>
            @else
              <td><a href="#" class="btn btn-success btn-sm video" data-video="{{ $guia->url }}" data-toggle="modal" data-target="#videoModal"><i class="fa fa-file-video-o fa 2x"></i></a></td>                        
            @endif
            <td>{{ $guia->Observacion }}</td>
            <td>{{ date("d/m/Y", strtotime($guia->created_at)) }}</td>
            <td><a href="{{ URL::to('/') }}/admin/guias/{{ $guia->id }}/edit" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
            <a href="{{ URL::to('/') }}/admin/guias/destroy/{{ $guia->id }}" onclick="return confirm('¿Seguro qué desea eliminar esta cápsula?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a>      </td>
             
          </tr>
          @endforeach
          </tbody>      
      </thead>
    </table>
  </div>
  <div id="tabla2" class="tab-pane fade">
    <table class="table table table-hover">
      <thead class="table">
        <th>Título</th>
        <th>Descripción</th>
        <th>Tipo de archivo</th>
        <th>Vídeo</th>      
        <th>Observación</th>        
        <th>Grupo</th>
        <th>Profesor</th>
        <th>Creado</th>     

        <tbody class="table">
         @foreach($guiasT as $guiaT)
         <tr>
             <td>{{ $guiaT->titulo }}</td>
            <td>{{ $guiaT->descripcion }}</td>
            @if (( $guiaT->archivo )=='')
              <td></td>            
            @else
              <td><a href="{{URL::to('/') }}/admin/guias/descargar/{{$guiaT->archivo }}" class="fa fa-file-text fa 4x"></a></td>            
            @endif
            @if(( $guiaT->url )=='#')
              <td></td>
            @else
              <td><a href="#" class="btn btn-success btn-sm video" data-video="{{ $guiaT->url }}" data-toggle="modal" data-target="#videoModal"><i class="fa fa-file-video-o fa 2x"></i></a></td>                        
            @endif
            <td>{{ $guiaT->Observacion }}</td>
            <td>{{ $guiaT->grupo }}</td>
            <td>{{ $guiaT->n_profesor }}</td>
            <td>{{ date("d/m/Y", strtotime($guiaT->created_at)) }}</td>            
          </tr>
          @endforeach
          </tbody>      
      </thead>
    </table>
  </div>  
</div>
    
    <a href="{!! url('admin/asignaturas'); !!}">Seleccionar asignatura</a><br><br><br>
   	<a href="{{ URL::to('/') }}/admin/guias/create/{{ $asignatura[0]->id }},{{ $asignatura[0]->id }}" class="btn btn-success" >Agregar guía</a>

{!! $guias->render() !!}
{!! $guiasT->render() !!}

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <iframe width="100%" height="350" src="" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
   	
@endsection