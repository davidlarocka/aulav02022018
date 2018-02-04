@extends('template_n.main')

@section('title', 'Materiales complementarios')

@section('content')

<!--  Buscador  -->

<!--  fin buscador  -->
<div class="title"><h3 class="title" class="">Materiales complementarios de {{ ucfirst($asignatura[0]->descripcion) }} {{ $grupo[0]->descripcion }}</h3></div>
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
         @foreach($materialcs as $materialc)
         <tr>
             <td>{{ $materialc->titulo }}</td>
            <td>{{ $materialc->descripcion }}</td>
            @if (( $materialc->archivo )=='')
              <td></td>            
            @else
              <td><a href="{{URL::to('/') }}/admin/materialcs/descargar/{{$materialc->archivo }}" class="fa fa-file-text fa 4x"></a></td>            
            @endif
            @if(( $materialc->url )=='#')
              <td></td>
            @else
              <td><a href="#" class="btn btn-success btn-sm video" data-video="{{ $materialc->url }}" data-toggle="modal" data-target="#videoModal"><i class="fa fa-file-video-o fa 2x"></i></a></td>                        
            @endif
            <td>{{ $materialc->Observacion }}</td>
            <td>{{ date("d/m/Y", strtotime($materialc->created_at)) }}</td>
            <td><a href="{{ URL::to('/') }}/admin/materialcs/{{ $materialc->id }}/edit" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
            <a href="{{ URL::to('/') }}/admin/materialcs/destroy/{{ $materialc->id }}" onclick="return confirm('¿Seguro qué desea eliminar esta cápsula?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a>      </td>
             
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
         @foreach($materialcsT as $materialcT)
         <tr>
             <td>{{ $materialcT->titulo }}</td>
            <td>{{ $materialcT->descripcion }}</td>
            @if (( $materialcT->archivo )=='')
              <td></td>            
            @else
              <td><a href="{{URL::to('/') }}/admin/materialcs/descargar/{{$materialcT->archivo }}" class="fa fa-file-text fa 4x"></a></td>            
            @endif
            @if(( $materialcT->url )=='#')
              <td></td>
            @else
              <td><a href="#" class="btn btn-success btn-sm video" data-video="{{ $materialcT->url }}" data-toggle="modal" data-target="#videoModal"><i class="fa fa-file-video-o fa 2x"></i></a></td>                        
            @endif
            <td>{{ $materialcT->Observacion }}</td>
            <td>{{ $materialcT->grupo }}</td>
            <td>{{ $materialcT->n_profesor }}</td> 
            <td>{{ date("d/m/Y", strtotime($materialcT->created_at)) }}</td>
          </tr>
          @endforeach
          </tbody>      
      </thead>
    </table>
  </div>  
</div>

    <a href="{!! url('admin/asignaturas'); !!}">Seleccionar asignatura</a><br><br><br>
   	<a href="{{ URL::to('/') }}/admin/materialcs/create/{{ $asignatura[0]->id }},{{ $grupo[0]->id }}" class="btn btn-success" >Agregar material</a>

{!! $materialcs->render() !!}
{!! $materialcsT->render() !!}
   	
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