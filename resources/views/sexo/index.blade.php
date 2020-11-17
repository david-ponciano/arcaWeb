@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Lista de Sexos <a href="sexos/create" title=""><button type="button" class="btn btn-success float-right">Agregar</button></a></h2> 

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
      <th scope="col">Sexos</th>
       <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  	
  	@foreach($sexo as $sexos)
    <tr>
      <th scope="row">{{$sexos->id}}</th>
      <td>{{$sexos->sexo}}</td>

      <td>
        
        <form action="{{route('sexos.destroy', $sexos->id)}}" method="POST">
          

        <a href="{{route('sexos.edit', $sexos->id)}}"><button type="button" class="btn btn-primary">Editar</button></a>

          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
        
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
  {{$sexo->links()}}
</div>

@endsection