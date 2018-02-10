
@extends('template_n.main')

@section('title', 'Listar Usuario')

@section('content')

<div class="titulo">
<h3>Listar Usuarios </h3>
 </div>

<div class="container">
  @include('flash::message')
</div>

 <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#tabla1">Alumnos</a></li>
  <li><a data-toggle="tab" href="#tabla2">Profesores</a></li>
  <li><a data-toggle="tab" href="#tabla3">Administradores</a></li>
</ul>

<div class="tab-content">
  <!--Inicio primera tabla-->
  <div id="tabla1" class="tab-pane fade in active">
   <table  class="table table table-hover">
   	<thead class="table">
   		<th>Nombre</th>
   		<th>email</th>
   		<th>Tipo</th>
         <th>Accion</th>
   	</thead>

   	<tbody class="table">
   	   @foreach($alumnos as $alumno)
   	   <tr>
   	   	   <td>{{ $alumno->name }}</td>
   	   	   <td>{{ $alumno-> email }}</td>
   	   	   <td>
   	   	   	
   	   	   	   @if($alumno->type== "admin")
                         <span class="label label-danger">{{   $alumno->type }}</span>
                    @elseif($alumno->type== "profesor")
                         <span class="label label-primary">{{ $alumno->type }} </span>
                  @else
                     <span class="label label-success">{{ $alumno->type }} </span>
                    @endif

   	   	   </td>
   	   	   <td><a href="{{ route('users.edit', $alumno->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
   	   	    <a href="{{ route('admin.users.destroy', $alumno->id)}}" onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a>      </td>
   	   </tr>
   	   @endforeach 

   	</tbody>

   </table>
   </div>
   <!--fin primera tabla-->
   <!--Inicio tabla 2-->
   <div id="tabla2" class="tab-pane fade">
    <table  class="table table table-hover">
      <thead class="table">
        <th>Nombre</th>
        <th>email</th>
        <th>Tipo</th>
        <th>Accion</th>
      </thead>
      <tbody class="table">
        @foreach($profesores as $profesor)
        <tr>
          <td>{{ $profesor->name }}</td>
          <td>{{ $profesor-> email }}</td>
          <td>
          @if($profesor->type== "admin")
          <span class="label label-danger">{{   $profesor->type }}</span>
          @elseif($profesor->type== "profesor")
          <span class="label label-primary">{{ $profesor->type }} </span>
          @else
          <span class="label label-success">{{ $profesor->type }} </span>
          @endif
          </td>
          <td><a href="{{ route('users.edit', $profesor->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
          <a href="{{ route('admin.users.destroy', $profesor->id)}}" onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a>      </td>
        </tr>
        @endforeach
      </tbody>
    </table> 
   </div>
   <!--Fin tabla 2-->
   <!--Inicio tabla 3-->
   <div id="tabla3" class="tab-pane fade">
    <table  class="table table table-hover">
      <thead class="table">
        <th>Nombre</th>
        <th>email</th>
        <th>Tipo</th>
        <th>Accion</th>
      </thead>
      <tbody class="table">
        @foreach($admins as $admin)
        <tr>
          <td>{{ $admin->name }}</td>
          <td>{{ $admin-> email }}</td>
          <td>
          @if($admin->type== "admin")
          <span class="label label-danger">{{   $admin->type }}</span>
          @elseif($admin->type== "profesor")
          <span class="label label-primary">{{ $admin->type }} </span>
          @else
          <span class="label label-success">{{ $admin->type }} </span>
          @endif
          </td>
          <td><a href="{{ route('users.edit', $admin->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
          <a href="{{ route('admin.users.destroy', $admin->id)}}" onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a>      </td>
        </tr>
        @endforeach
      </tbody>
    </table> 
   </div>
   <!--Fin tabla 3-->
</div>

<br/>
<br/>
   <a href="{!! url('admin/users/create'); !!}" class="btn btn-success" >Registrar Nuevo Usuario</a>
 
   {{ $alumnos->render() }}
@endsection