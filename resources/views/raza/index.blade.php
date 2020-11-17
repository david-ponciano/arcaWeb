@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Lista de Razas <a href="razas/create" title=""><button type="button" class="btn btn-success float-right">Agregar</button></a></h2> 

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
      <th scope="col">Raza</th>
       <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  	
  	@foreach($raza as $razas)
    <tr>
      <th scope="row">{{$razas->id}}</th>
      <td>{{$razas->raza}}</td>

      <td>
        
        <form action="{{route('razas.destroy', $razas->id)}}" method="POST">
          

        <a href="{{route('razas.edit', $razas->id)}}"><button type="button" class="btn btn-primary">Editar</button></a>

          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
        
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
  {{$raza->links()}}
</div>

@endsection