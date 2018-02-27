@extends('template_n.main')

@section('title', 'Asignaturas')

@section('content')

<div class="title"><h3 class="title" class="">{{ ucfirst($datos[0]->grupo) }}</h3></div>

<div class="container">
  @include('flash::message')
</div>

@foreach($datos as $dato)
  {{ $dato->asignatura }}
@endforeach

@endsection