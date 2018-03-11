@extends('template_n.main')

@section('title', 'Asignaturas')

@section('content')

<style>
.selector {
  position: absolute;
  left: 50%;
  width: 140px;
  height: 140px;
  margin-top: -500px;
  margin-left: -70px;
}
</style>

<div class="container">
  @include('flash::message')
</div>

  @foreach($perfil as $p)
     <p class="centered">
        <a href="profile.html"> <class="img-circle" width="60">
          <img src="{{ URL::to('/') }}/images_n/users/{{ $p->nombre }}" class="img-circle" width="120" /></a>
     </p>

  @endforeach

  <div class="form-group">  
  {!! Form::open(['route' => 'alumnosAsig.perfil_store', 'method' => 'POST','files' => true, 'id' => 'formulario']) !!}

    <fieldset> 
    <div align="center">
      {!! Form::label('image','Seleccione imagen de perfil') !!}
        {!! Form::file('image') !!}
        <br/>
        {!! Form::submit('Actualizar', ['class' => 'btn btn-success'] )!!}
      {!! Form::close() !!} 
    </div>
    </fieldset>
  </div>
@endsection