@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Lista de mascotas <a href="mascotas/create" title=""><button type="button" class="btn btn-success float-right">Agregar</button></a></h2> 

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
      <th scope="col">Nació</th>
      <th scope="col">Cliente</th>
      <th scope="col">Especie</th>
      <th scope="col">Raza</th>
      <th scope="col">Sexo</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  	
  	@foreach($mascota as $mascotas)
    <tr>
      <th scope="row">{{$mascotas->id}}</th>
      <td>{{$mascotas->nombre}}</td>
      <td>{{$mascotas->fechaNac}}</td>
      <td>{{$mascotas->id_cliente}}</td>
      <td>{{$mascotas->id_especie}}</td>
      <td>{{$mascotas->id_raza}}</td>
      <td>{{$mascotas->id_sexo}}</td>
      <td>
        
        <form action="{{route('mascotas.destroy', $mascotas->id)}}" method="POST">
          
          <a href="{{route('mascotas.show', $mascotas->id)}}"><button type="button" class="btn btn-secondary">Ver</button></a>

        <a href="{{route('mascotas.edit', $mascotas->id)}}"><button type="button" class="btn btn-primary">Editar</button></a>

          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
        
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
  {{$mascota->links()}}
</div>

@endsection