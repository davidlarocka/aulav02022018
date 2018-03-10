@extends('template_n.main')

@section('title', 'Proyectos')

@section('content')

<div class="title">
  <h3 class="title" class="">Proyectos de {{ ucfirst($asignatura[0]->asignatura) }} {{ $grupo[0]->grupo }}</h3>
</div>

<br/>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#tabla1">Por entregar</a></li>
  <li><a data-toggle="tab" href="#tabla2">Finalizados</a></li>
</ul>

<div class="tab-content">
  <div id="tabla1" class="tab-pane fade in active">
    <!--  Proyectos por entregar  -->
    <table class="table table table-hover">
        <thead class="table">
            <th>Proyecto</th>
            <th>Descripción</th>
            <th>Fecha de entrega</th>
            <th>Archivo</th>          
            <th>Vídeo</th>
            <th>Observaciones</th>
            <th>Chat</th>
            <tbody class="table">
             @foreach($proyectosPe as $proyecto)
             <tr>
                <td>{{ $proyecto->nombre_proyecto }}</td>
                <td>{{ $proyecto->descripcion }}</td>
                <td>{{ date("d/m/Y", strtotime($proyecto->fecha_entrega)) }}</td>
                @if (( $proyecto->archivo )=='')
                  <td></td>            
                @else
                  <td><a href="{{URL::to('/') }}/admin/publicaciones/descargar/{{$proyecto->archivo }}" class="fa fa-file-text fa 4x"></a></td>            
                @endif
                @if(( $proyecto->url )=='#')
                  <td></td>
                @else
                  <td><a href="#" class="btn btn-success btn-sm video" data-video="{{ $proyecto->url }}" data-toggle="modal" data-target="#videoModal"><i class="fa fa-file-video-o fa 2x"></i></a></td>                        
                @endif
                <td>{{ $proyecto->observaciones }}</td>
                <td><a href="{{URL::to('/') }}/admin/messages/{{ $proyecto->id }}" class="btn btn-primary btn-sm email"><i class="fa fa-envelope"></i></td>
              </tr>
              @endforeach
              </tbody>        
        </thead>
    </table>      
  <!--  Fin-->  
  </div>
  <div id="tabla2" class="tab-pane fade">
    <!--  Proyectos finalizados  -->
    <table class="table table table-hover">
        <thead class="table">
            <th>Proyecto</th>
            <th>Descripción</th>
            <th>Fecha de entrega</th>
            <th>Archivo</th>          
            <th>Vídeo</th>
            <th>Observaciones</th>
            <tbody class="table">
             @foreach($proyectosPf as $proyecto)
             <tr>
                <td>{{ $proyecto->nombre_proyecto }}</td>
                <td>{{ $proyecto->descripcion }}</td>
                <td>{{ date("d/m/Y", strtotime($proyecto->fecha_entrega)) }}</td>
                @if (( $proyecto->archivo )=='')
                  <td></td>            
                @else
                  <td><a href="{{URL::to('/') }}/admin/publicaciones/descargar/{{$proyecto->archivo }}" class="fa fa-file-text fa 4x"></a></td>            
                @endif
                @if(( $proyecto->url )=='#')
                  <td></td>
                @else
                  <td><a href="#" class="btn btn-success btn-sm video" data-video="{{ $proyecto->url }}" data-toggle="modal" data-target="#videoModal"><i class="fa fa-file-video-o fa 2x"></i></a></td>                        
                @endif
                <td>{{ $proyecto->observaciones }}</td>
              </tr>
              @endforeach
              </tbody>        
        </thead>
    </table>            
    <!--  Fin-->
  </div>
</div>
<a href="{!! url('admin/alumnoAsig'); !!}">Seleccionar asignatura</a><br><br><br>
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