
@extends('template_n.main')

@section('title', 'Listar Usuario')



@section('content')



<div >

<div class="titulo">

<h3>Listar Usuarios </h3>
 </div>

   <table  class="table table table-hover">
   	<thead class="table">
   		<th>ID</th>
   		<th>Nombre</th>
   		<th>email</th>
   		<th>Tipo</th>
         <th>Accion</th>
   	</thead>

   	<tbody class="table">
   	   @foreach($users as $user)
   	   <tr>
   	   	   <td>{{ $user->id }}</td>
   	   	   <td>{{ $user->name }}</td>
   	   	   <td>{{ $user-> email }}</td>
   	   	   <td>
   	   	   	
   	   	   	   @if($user->type== "admin")
                         <span class="label label-danger">{{   $user->type }}</span>
                    @elseif($user->type== "profesor")
                         <span class="label label-primary">{{ $user->type }} </span>
                  @else
                     <span class="label label-success">{{ $user->type }} </span>
                    @endif



   	   	   </td>
   	   	   <td><a href="{{ route('users.edit', $user->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
   	   	    <a href="{{ route('admin.users.destroy', $user->id)}}" onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a>      </td>
   	   </tr>
   	   @endforeach 

   	</tbody>

   </table>

   <a href="{!! url('admin/users/create'); !!}" class="btn btn-success" >Registrar Nuevo Usuario</a>
 
   </div>
   {{ $users->render() }}
@endsection