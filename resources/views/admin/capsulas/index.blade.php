@extends('template_n.main')

@section('title', 'Cápsulas')

@section('content')

<!--  Buscador  -->

<!--  fin buscador  -->
<div class="title"><h3 class="title" class="">Cápsulas de {{ ucfirst($asignatura[0]->descripcion) }} {{ $grupo[0]->descripcion }}</h3></div>

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
         @foreach($capsulas as $capsula)
         <tr>
             <td>{{ $capsula->titulo }}</td>
            <td>{{ $capsula->descripcion }}</td>
            @if (( $capsula->archivo )=='')
              <td></td>            
            @else
              <td><a href="{{URL::to('/') }}/admin/capsulas/descargar/{{$capsula->archivo }}" class="fa fa-file-text fa 4x"></a></td>            
            @endif
            @if(( $capsula->url )=='#')
              <td></td>
            @else
              <td><a href="#" class="btn btn-success btn-sm video" data-video="{{ $capsula->url }}" data-toggle="modal" data-target="#videoModal"><i class="fa fa-file-video-o fa 2x"></i></a></td>                        
            @endif
            <td>{{ $capsula->Observacion }}</td>
            <td>{{ date("d/m/Y", strtotime($capsula->created_at)) }}</td>
            <td><a href="{{ URL::to('/') }}/admin/capsulas/{{ $capsula->id }}/edit" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
            <a href="{{ URL::to('/') }}/admin/capsulas/destroy/{{ $capsula->id }}" onclick="return confirm('¿Seguro qué desea eliminar esta cápsula?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a>      </td>
             
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
         @foreach($capsulasT as $capsulaT)
         <tr>
             <td>{{ $capsulaT->titulo }}</td>
            <td>{{ $capsulaT->descripcion }}</td>
            @if (( $capsulaT->archivo )=='')
              <td></td>            
            @else
              <td><a href="{{URL::to('/') }}/admin/capsulas/descargar/{{$capsulaT->archivo }}" class="fa fa-file-text fa 4x"></a></td>            
            @endif
            @if(( $capsulaT->url )=='#')
              <td></td>
            @else
              <td><a href="#" class="btn btn-success btn-sm video" data-video="{{ $capsulaT->url }}" data-toggle="modal" data-target="#videoModal"><i class="fa fa-file-video-o fa 2x"></i></a></td>                        
            @endif
            <td>{{ $capsulaT->Observacion }}</td>
            <td>{{ $capsulaT->grupo }}</td>
            <td>{{ $capsulaT->n_profesor }}</td>
            <td>{{ date("d/m/Y", strtotime($capsulaT->created_at)) }}</td>
          </tr>
          @endforeach
          </tbody>      
      </thead>
    </table>
  </div>  
</div>

    <a href="{!! url('admin/asignaturas'); !!}">Seleccionar asignatura</a><br><br><br>
   	<a href="{{ URL::to('/') }}/admin/capsulas/create/{{ $asignatura[0]->id }},{{ $grupo[0]->id }}" class="btn btn-success" >Agregar cápsula</a>

{!! $capsulas->render() !!}
{!! $capsulasT->render() !!}
  
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