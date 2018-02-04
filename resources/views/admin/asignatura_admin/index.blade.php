@extends('template_n.main')

@section('title', 'Listado  de Asignaturas')

@section('content')

<!--  Buscador  -->
{!! Form::open(['route' => 'asignatura_admin.index', 'method' => 'GET', 'class'=>'navbar-form pull-right']) !!}
     <div class="input-group">
        {!! Form::text('descripcion',null,['class' => 'form-control', 'placeholder' => 'Buscar Asignatura..', 'aria-describedby' => 'search' ]) !!}
         <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>

     </div>
        
{!! Form::close() !!}
<!--  fin buscador  -->
<div class="title"><h3 class="title" class="">Listar Asignaturas </h3> </div>
<table class="table table table-hover">
   	<thead class="table">
   		<th>ID</th>
   		<th>Asignatura</th>
   		<th>Accion</th>

   	

      <tbody class="table">
       @foreach($asig as $asignatura)
       <tr>
           <td>{{ $asignatura->id }}</td>
           <td>{{ $asignatura->descripcion }}</td>

            <td><a href="{{ route('asignatura_admin.edit', $asignatura->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
            <a href="{{ route('asignatura_admin.destroy', $asignatura->id) }}" onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a>      </td>
           
          </tr>
          @endforeach
          </tbody>
   	  
   	  
   	</thead>
   	</table>

   	 <a href="{!! url('admin/asignatura_admin/create'); !!}" class="btn btn-success" >Registrar Nueva Asignatura</a>

 {!! $asig->render() !!}
   	
@endsection