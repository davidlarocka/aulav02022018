@extends('template_n.main')

@section('title', 'Listado  de Articulos')

@section('content')
{!! Form::open(['route' => 'articulos.index', 'method' => 'GET', 'class'=>'navbar-form pull-right']) !!}
     <div class="input-group">
        {!! Form::text('titulo',null,['class' => 'form-control', 'placeholder' => 'Buscar Articulo ..', 'aria-describedby' => 'search' ]) !!}
         <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>

     </div>
        
{!! Form::close() !!}

<div class="titulo"><h3 class="title">Listado de Articulos </h3> </div>


<table class="table table table-hover" >
    <thead class="table">
      <th>ID</th>
      <th>Titulo</th>
      <th>Fecha</th>
      <th>Categoria</th>
      <th>Accion</th>

      </thead>
  <tbody class="table">
      @foreach($articulos as $articulo)
       <tr>
           <td>{{ $articulo->id }}</td>
           <td>{{ $articulo->titulo }}</td>
           <td>{{ $articulo->fecha }}</td>
           <td>{{ $articulo->categoria->nombre }}</td>
         
           <td><a href="{{ route('articulos.edit', $articulo->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
            <a href="{{ route('articulos.destroy', $articulo->id) }}" onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a>      </td>
           
      
          </tr>
          @endforeach 
   </tbody>
    </table>
<a href="/pruebita/public/admin/articulos/create" class="btn btn-success" >Registrar Nuevo Articulo</a>
<div class="text-center">
  
    {!! $articulos->render() !!}
</div>
@endsection
