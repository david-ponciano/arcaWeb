@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Lista de Estados <a href="estados/create" title=""><button type="button" class="btn btn-success float-right">Agregar</button></a></h2> 

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
      <th scope="col">Estado</th>
       <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  	
  	@foreach($estado as $estados)
    <tr>
      <th scope="row">{{$estados->id}}</th>
      <td>{{$estados->estado}}</td>

      <td>
        
        <form action="{{route('estados.destroy', $estados->id)}}" method="POST">
          

        <a href="{{route('estados.edit', $estados->id)}}"><button type="button" class="btn btn-primary">Editar</button></a>

          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
        
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
  {{$estado->links()}}
</div>

@endsection