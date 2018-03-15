@extends('template_n.main')

@section('title', 'Proyecto')

@section('content')

	<div class="title"><h3 class="title" class="">Proyecto de {{ ucfirst($proyecto[0]->nombre_proyecto) }}</h3></div>
	<br>
	<p><b>Fecha de entrega: </b>{{ date("d/m/Y", strtotime($proyecto[0]->fecha_entrega)) }}</p>
	<p><b>Descripción: </b>{{ ucfirst($proyecto[0]->descripcion) }}</p>
	@if (( $proyecto[0]->archivo )!='')               
		<p><b>Archivo: </b><a href="{{URL::to('/') }}/admin/proyectos/descargar/{{$proyecto[0]->archivo }}" class="fa fa-file-text fa 4x"></a></p>
	@endif
	@if(( $proyecto[0]->url )!='#')
		<p><b>Vídeo: </b><a href="#" class="btn btn-success btn-sm video" data-video="{{ $proyecto[0]->url }}" data-toggle="modal" data-target="#videoModal"><i class="fa fa-file-video-o fa 2x"></i></a></p>
	@endif
	@if( $proyecto[0]->observaciones != '')
		<p><b>Observaciones: </b>{{ ucfirst($proyecto[0]->observaciones) }} </p>
	@endif
	<br>
	@if( strtoupper(Auth::user()->type) =='PROFESOR' )
		<a href="{!! url('admin/proyectos'); !!}/{{ $proyecto[0]->id_asignatura }},{{ $proyecto[0]->id_grupo }}">Volver</a><br>
	@else
		<a href="{!! url('admin/alumnoProyecto'); !!}/{{ $proyecto[0]->id_asignatura }},{{ $proyecto[0]->id_grupo }}">Volver</a><br>
	@endif
	<div class="container">
	  @include('flash::message')
	</div>	
	<h3>Mensajes</h3>
    <div class="col-md-6">
        <h4>{{ $thread->subject }}</h4>
        @each('admin.messenger.partials.messages', $thread->messages, 'message')

        @include('admin.messenger.partials.form-message')
    </div>

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

@stop
