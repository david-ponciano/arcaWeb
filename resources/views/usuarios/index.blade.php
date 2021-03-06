@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Lista de usuarios <a href="usuarios/create" title=""><button type="button" class="btn btn-success float-right">Agregar</button></a></h2> 

  <h6>
    @if($search)
    <div class="alert alert-primary" role="alert">
    Los resultados para tu busqueda '{{$search}}'' son:
  </div>
    @endif
  </h6>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Rol</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>
        @foreach($user->roles as $role)
          {{$role->name}}
        @endforeach
      </td>     
      <td>
        
        <form action="{{route('usuarios.destroy', $user->id)}}" method="POST">
          
          <a href="{{route('usuarios.show', $user->id)}}"><button type="button" class="btn btn-secondary">Ver</button></a>
        <a href="{{route('usuarios.edit', $user->id)}}"><button type="button" class="btn btn-primary">Editar</button></a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
        
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
  {{$users->links()}}
</div>
@endsection