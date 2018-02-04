@extends('template_n.main')

@section('title', 'Listado  de Tags')

@section('content')

<!--  Buscador  -->
{!! Form::open(['route' => 'tags.index', 'method' => 'GET', 'class'=>'navbar-form pull-right']) !!}
     <div class="input-group">
        {!! Form::text('nombre',null,['class' => 'form-control', 'placeholder' => 'Buscar tags..', 'aria-describedby' => 'search' ]) !!}
         <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>

     </div>
        
{!! Form::close() !!}
<!--  fin buscador  -->
<div class="titulo"><h3 class="title">Listar Tags </h3> </div>
<table class="table table table-hover">
   	<thead class="table">
   		<th>ID</th>
   		<th>Nombre</th>
   		<th>Accion</th>

   		<tbody class="table">
   	   @foreach($tags as $tag)
   	   <tr>
   	   	   <td>{{ $tag->id }}</td>
   	   	   <td>{{ $tag->nombre }}</td>

   	   	    <td><a href="" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
   	   	    <a href="" onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a>      </td>
   	   	   
   	   	  </tr>
   	   	  @endforeach
   	   	  </tbody>
   	</thead>
   	</table>

   	 <a href="/pruebita/public/admin/tags/create" class="btn btn-success" >Registrar Nuevo Tags</a>

   <button 
   type="button" 
   class="btn btn-primary btn-lg" 
   data-toggle="modal" 
   data-target="#favoritesModal">
  Add to Favorites
</button>


<div class="modal fade" id="favoritesModal"   
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" 
        id="favoritesModalLabel">The Sun Also Rises</h4>
      </div>
      <div class="modal-body">
        <p>
        Please confirm you would like to add 
        <b><span id="fav-title">The Sun Also Rises</span></b> 
        to your favorites list.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" 
           class="btn btn-default" 
           data-dismiss="modal">Close</button>
        <span class="pull-right">
          <button type="button" class="btn btn-primary">
            Add to Favorites
          </button>
        </span>
      </div>
    </div>
  </div>
</div>

   	  {!! $tags->render() !!}
@endsection