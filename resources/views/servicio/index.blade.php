@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Lista de Servicios <a href="servicios/create" title=""><button type="button" class="btn btn-success float-right">Agregar</button></a></h2> 

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
      <th scope="col">Servicio</th>
       <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  	
  	@foreach($servicio as $servicios)
    <tr>
      <th scope="row">{{$servicios->id}}</th>
      <td>{{$servicios->servicio}}</td>

      <td>
        
        <form action="{{route('servicios.destroy', $servicios->id)}}" method="POST">
          

        <a href="{{route('servicios.edit', $servicios->id)}}"><button type="button" class="btn btn-primary">Editar</button></a>

          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
        
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
  {{$servicio->links()}}
</div>

@endsection