@extends('template_n.main')

@section('title', 'Materiales complementarios')

@section('content')

<!--  Buscador  -->

<!--  fin buscador  -->
<div class="title"><h3 class="title" class="">Materiales de {{ ucfirst($asignatura[0]->descripcion) }} {{ $grupo[0]->descripcion }}</h3></div>
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
         @foreach($materialhs as $materialh)
         <tr>
             <td>{{ $materialh->titulo }}</td>
            <td>{{ $materialh->descripcion }}</td>
            @if (( $materialh->archivo )=='')
              <td></td>            
            @else
              <td><a href="{{URL::to('/') }}/admin/materialhs/descargar/{{$materialh->archivo }}" class="fa fa-file-text fa 4x"></a></td>            
            @endif
            @if(( $materialh->url )=='#')
              <td></td>
            @else
              <td><a href="#" class="btn btn-success btn-sm video" data-video="{{ $materialh->url }}" data-toggle="modal" data-target="#videoModal"><i class="fa fa-file-video-o fa 2x"></i></a></td>                        
            @endif
            <td>{{ $materialh->Observacion }}</td>
            <td>{{ date("d/m/Y", strtotime($materialh->created_at)) }}</td>
            <td><a href="{{ URL::to('/') }}/admin/materialhs/{{ $materialh->id }}/edit" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
            <a href="{{ URL::to('/') }}/admin/materialhs/destroy/{{ $materialh->id }}" onclick="return confirm('¿Seguro qué desea eliminar esta cápsula?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a>      </td>
             
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
         @foreach($materialhsT as $materialhT)
         <tr>
             <td>{{ $materialhT->titulo }}</td>
            <td>{{ $materialhT->descripcion }}</td>
            @if (( $materialhT->archivo )=='')
              <td></td>            
            @else
              <td><a href="{{URL::to('/') }}/admin/materialhs/descargar/{{$materialhT->archivo }}" class="fa fa-file-text fa 4x"></a></td>            
            @endif
            @if(( $materialhT->url )=='#')
              <td></td>
            @else
              <td><a href="#" class="btn btn-success btn-sm video" data-video="{{ $materialhT->url }}" data-toggle="modal" data-target="#videoModal"><i class="fa fa-file-video-o fa 2x"></i></a></td>                        
            @endif
            <td>{{ $materialhT->Observacion }}</td>
            <td>{{ $materialhT->grupo }}</td>
            <td>{{ $materialhT->n_profesor }}</td> 
            <td>{{ date("d/m/Y", strtotime($materialhT->created_at)) }}</td>
          </tr>
          @endforeach
          </tbody>      
      </thead>
    </table>
  </div>  
</div>

  <a href="{!! url('admin/asignaturas'); !!}">Seleccionar asignatura</a><br><br><br>
  <a href="{{ URL::to('/') }}/admin/materialhs/create/{{ $asignatura[0]->id }},{{ $grupo[0]->id }}" class="btn btn-success" >Agregar material</a>

{!! $materialhs->render() !!}     
{!! $materialhsT->render() !!}   	

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