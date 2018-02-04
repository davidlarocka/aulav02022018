@extends('template_n.main')

@section('title', 'Listado  de Cursos')

@section('content')

<!--  Buscador  -->
{!! Form::open(['route' => 'cursos.index', 'method' => 'GET', 'class'=>'navbar-form pull-right']) !!}
     <div class="input-group">
        {!! Form::text('descripcion',null,['class' => 'form-control', 'placeholder' => 'Buscar Curso..', 'aria-describedby' => 'search' ]) !!}
         <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>

     </div>
        
{!! Form::close() !!}
<!--  fin buscador  -->
<div class="title"><h3 class="title" class="">Listar Cursos </h3> </div>
<table class="table table table-hover">
    <thead class="table">
      <th>ID</th>
      <th>Curso</th>
      <th>Accion</th>

    
 <tbody class="table">
       @foreach($curs as $cursos)
       <tr>
           <td>{{ $cursos->id }}</td>
           <td>{{ $cursos->descripcion }}</td>

            <td><a href="{{ route('cursos.edit', $cursos->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
            <a href="{{ route('cursos.destroy', $cursos->id) }}" onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a>      </td>
           
          </tr>
          @endforeach
          </tbody>
    
      
    </thead>
    </table>

     <a href="{!! url('admin/cursos/create'); !!}" class="btn btn-success" >Registrar Nuevo Curso</a>

{!! $curs->render() !!}
    
@endsection