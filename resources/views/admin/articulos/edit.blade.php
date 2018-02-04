@extends('template_n.main')
@section('title')
Editar  Articulo
@endsection

@section('content')

 <h3 class="titulo">Editar Articulo </h3>
<div class="tabla">
 
  

   {!! Form::open(['route' => ['articulos.update', $articulos], 'method' => 'PUT']) !!}

   <div class="form-group">
        {!! Form::label('titulo','Titulo') !!}
        {!! Form::text('titulo', $articulos->titulo, ['class'=> 'form-control', 'placeholder'=> 'Titulo del Articulo..', 'required'])!!}
      </div>

        <div class="form-group">
        {!! Form::label('categoria_id','Categoria') !!}
        {!! Form::select('categoria_id', $categoria, $articulos->categoria->id, ['class'=> 'form-control', 'placeholder'=> 'Seleccione..', 'required'])!!}
      </div>


  
   <div class="form-group">
        {!! Form::label('contenido','Contenido') !!}
        {!! Form::textarea('contenido',$articulos->contenido,['class'=> 'form-control textarea-content'])!!}
      </div>

    <div class="form-group">
        
        {!! Form::submit('Editar articulo', ['class' => 'btn btn-success']) !!}

      </div>

{!! Form::close() !!}

</div>
@endsection

