@extends('template_n.main')
@section('title')
Crear Tags
@endsection

@section('content')

{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}


<div class="titulo">
<h3 class="title">Agregar Tags </h3>
</div>
<div class="tabla">

  <div class="form-group">

     {!! Form::label('nombre','Nombre')!!}
     {!! Form::text('nombre',null,['class' => 'form-control', 'placeholder' => 'Nombre Tags','required'])!!}

  </div> 
 
  <div align="right">
  	
  	{!! Form::submit('Registrar', ['class' => 'btn btn-success'] )!!}

  </div>
  </div>


  <div class="modal fade" id="popupNuevaAventura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
<h4 class="modal-title" id="myModalLabel">Creando una nueva aventura</h4>
</div>
<div id="nuevaAventura" class="modal-body">
<form role="form">
<div class="form-group">
<label for="nombreAventura">Nombre de la aventura</label>
<input type="text" class="form-control" id="nombreAventura" placeholder="Reinos de Papel y los dados trucados..." required>
</div>
<div class="form-group">
<label for="tiempoJuego">Tiempo estimado de juego</label>
<input type="number" class="form-control" id="tiempoJuego" placeholder="7 horas" required> 
</div>
<div class="form-group">
<label for="nivelJuego">Nivel de los jugadores</label>
<input type="number" class="form-control" id="nivelJuego" placeholder="2" required>
</div> 
</form> 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
<button type="button" class="btn btn-success" id="botonAventura" onClick="nuevaAventura()">Crear</button> 
</div>
</div>
</div>
</div>
 <!-- <div>
  <a href="" class="btn btn-success">boton bootstrap</a>
  </div> -->
{!! Form::close() !!}



@endsection