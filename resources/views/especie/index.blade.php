@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Lista de Especies <a href="especies/create" title=""><button type="button" class="btn btn-success float-right">Agregar</button></a></h2> 

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
      <th scope="col">Especie</th>
       <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  	
  	@foreach($especie as $especies)
    <tr>
      <th scope="row">{{$especies->id}}</th>
      <td>{{$especies->especie}}</td>

      <td>
        
        <form action="{{route('especies.destroy', $especies->id)}}" method="POST">
          

        <a href="{{route('especies.edit', $especies->id)}}"><button type="button" class="btn btn-primary">Editar</button></a>

          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
        
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
  {{$especie->links()}}
</div>

@endsection