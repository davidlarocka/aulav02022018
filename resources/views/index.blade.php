@extends('template_n.main')

@section('title')
Admin
@endsection
@section('content')
 
<center>
<p>
	Bienvenido al Aula Virtual del Colegio <br/>
</p>
<h3>San Nicolas Diacono</h3>



<img src="{{ URL::to('/') }}/images_n/logo.jpg" class="" width="120" /> 

<br/>
<div class="btn btn-default">Ver Informes</div>

<a href="{!! url('admin/asignaturas'); !!}" class="btn btn-success">Ver asignaturas</a>

</center>
@endsection

@section('javascript')
<script>alert("hola")</script>
@endsection