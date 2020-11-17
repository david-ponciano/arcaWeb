@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Historiales clínicos <a href="historiales/create" title=""><button type="button" class="btn btn-success float-right">Agregar</button></a></h2> 

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
      <th scope="col">Cliente</th>
      <th scope="col">Mascota</th>
      <th scope="col">Servicio</th>
      <th scope="col">Est. Reproducción</th>
      <th scope="col">Fecha</th>
      <th scope="col">Motivo</th>
      <th scope="col">Problema</th>
      <th scope="col">Diagnóstico</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  	
  	@foreach($historial as $historiales)
    <tr>
      <th scope="row">{{$historiales->id}}</th>
      <td>{{$historiales->id_cliente}}</td>
      <td>{{$historiales->id_mascota}}</td>
      <td>{{$historiales->id_servicio}}</td>
      <td>{{$historiales->id_estado}}</td>
      <td>{{$historiales->fechaSer}}</td>
      <td>{{$historiales->motivo}}</td>
      <td>{{$historiales->problema}}</td>
      <td>{{$historiales->diagnostico}}</td>

      <td>
        
        <form action="{{route('historiales.destroy', $historiales->id)}}" method="POST">
          
          <a href="{{route('historiales.show', $historiales->id)}}"><button type="button" class="btn btn-secondary">Ver</button></a>

          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
        
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
  {{$historial->links()}}
</div>

@endsection