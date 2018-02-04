@extends('template_n.main')

@section('title', 'Listado  de Categorias')

@section('content')

<!--  Buscador  -->
{!! Form::open(['route' => 'categorias.index', 'method' => 'GET', 'class'=>'navbar-form pull-right']) !!}
     <div class="input-group">
        {!! Form::text('nombre',null,['class' => 'form-control', 'placeholder' => 'Buscar categoria..', 'aria-describedby' => 'search' ]) !!}
         <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>

     </div>
        
{!! Form::close() !!}
<!--  fin buscador  -->
<div class="titulo"><h3 class="title" class="">Listar Categorias </h3> </div>
<table class="table table table-hover">
   	<thead class="table">
   		<th>ID</th>
   		<th>Nombre</th>
   		<th>Accion</th>

   		<tbody class="table">
   	   @foreach($categorias as $categoria)
   	   <tr>
   	   	   <td>{{ $categoria->id }}</td>
   	   	   <td>{{ $categoria->nombre }}</td>

   	   	    <td><a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
   	   	    <a href="{{ route('categorias.destroy', $categoria->id) }} " onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a>      </td>
   	   	   
   	   	  </tr>
   	   	  @endforeach
   	   	  </tbody>
   	</thead>
   	</table>

   	 <a href="/pruebita/public/admin/categorias/create" class="btn btn-success" >Registrar Nuevo Categoria</a>

   	  {!! $categorias->render() !!}
@endsection