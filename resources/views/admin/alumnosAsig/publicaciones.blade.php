@extends('template_n.main')

@section('title', 'Publicaciones')

@section('content')

<div class="title">
  <h3 class="title" class="">{{ ucfirst($publicacion[0]->publicacion) }} de {{ ucfirst($asignatura[0]->asignatura) }} {{ $grupo[0]->grupo }}</h3>
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
<br/>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#tabla1">Publicaciones</a></li>
</ul>
<div class="tab-content">
  <div id="tabla1" class="tab-pane fade in active">
    <!--  Proyectos por entregar  -->
    <table class="table table table-hover">
        <thead class="table">
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Archivo</th>          
            <th>Vídeo</th>
            <th>Profesor</th>            
            <th>Observaciones</th>
            <tbody class="table">
             @foreach($publicaciones as $publicacion)
             <tr>
                <td>{{ $publicacion->titulo }}</td>
                <td>{{ $publicacion->descripcion }}</td>
                @if (( $publicacion->archivo )=='')
                  <td></td>            
                @else
                  <td><a href="{{URL::to('/') }}/admin/publicaciones/descargar/{{ $publicacion->archivo }}" class="fa fa-file-text fa 4x"></a></td>            
                @endif
                @if(( $publicacion->url )=='#')
                  <td></td>
                @else
                  <td><a href="#" class="btn btn-success btn-sm video" data-video="{{ $publicacion->url }}" data-toggle="modal" data-target="#videoModal"><i class="fa fa-file-video-o fa 2x"></i></a></td>                        
                @endif
                <td>{{ $publicacion->nombreProf }} {{ $publicacion->apellidoProf }}</td>
                <td>{{ $publicacion->observacion }}</td>
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