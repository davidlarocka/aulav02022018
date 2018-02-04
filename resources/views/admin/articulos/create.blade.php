@extends('template_n.main')
@section('title')
Agregar  Articulo
@endsection

@section('content')
    {!! Form::open(['route' => 'articulos.store', 'method' => 'POST', 'files' => true])!!}

    <div class="titulo">
    <h3 class="title">Agregar Articulo </h3>
    </div>

      <div class="tabla">
      <div class="form-group">
      	{!! Form::label('titulo','Titulo') !!}
      	{!! Form::text('titulo', null, ['class'=> 'form-control', 'placeholder'=> 'Titulo del Articulo..', 'required'])!!}
      </div>

      <div class="form-group">
      	{!! Form::label('categoria_id','Categoria') !!}
      	{!! Form::select('categoria_id', $categorias,null, ['class'=> 'form-control', 'placeholder'=> 'Seleccione..', 'required'])!!}
      </div>
      <div>
      
         {!! Form::label('fecha','Fecha') !!}
        {!! Form::date('fecha',null,['class'=> 'form-control'])!!}
                           
      </div>

  
      
   <div class="form-group">
        {!! Form::label('contenido','Contenido') !!}
        {!! Form::textarea('contenido',null,['class'=> 'form-control textarea-content'])!!}
      </div>

    
      <div class="form-group">
      	{!! Form::label('image','Imagen') !!}
      	{!! Form::file('image') !!}
      </div>
     
   
     

      <div  align="right">
      	
      	{!! Form::submit('Agregar articulo', ['class' => 'btn btn-success']) !!}

      </div>

       </div>

    {!! Form::close() !!}
  
@endsection 