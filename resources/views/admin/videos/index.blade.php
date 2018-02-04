@extends('template_n.main')

@section('title', 'Vídeos')

@section('content')

<!--  Buscador  -->

<!--  fin buscador  -->
<div class="title"><h3 class="title" class="">Lista de vídeos de {{ ucfirst($asignatura[0]->descripcion) }}</h3></div>
<table class="table table table-hover">
   	<thead class="table">
   		<th>Título</th>
   		<th>Descripción</th>
   		<th>Tipo de archivo</th>
   		<th>Observación</th>   	

      <tbody class="table">
       @foreach($videos as $video)
       <tr>
           <td>{{ $video->titulo }}</td>
          <td>{{ $video->descripcion }}</td>
          <td><a href="{{URL::to('/') }}/admin/videos/descargar/{{$video->url }}" class="fa fa-file-text fa 4x"></a></td>
          <td>{{ $video->Observacion }}</td>
          <td><a href="{{ URL::to('/') }}/admin/videos/{{ $video->id }}/edit" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
          <a href="{{ URL::to('/') }}/admin/videos/destroy/{{ $video->id }}" onclick="return confirm('¿Seguro qué desea eliminar este vídeo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a>      </td>
           
        </tr>
        @endforeach
        </tbody>  	  
   	</thead>
</table>

   	<a href="{{ URL::to('/') }}/admin/videos/create/{{ ucfirst($asignatura[0]->id) }}" class="btn btn-success" >Agregar un vídeo</a>
   	
@endsection