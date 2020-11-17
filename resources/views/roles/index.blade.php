@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6  mx-auto">
				
			<h2>Roles de usuarios <a href="roles/create" title=""><button type="button" class="btn btn-success float-right">Agregar</button></a></h2>	

		  
				<table class="table">
			  	<thead class="thead-dark">
			    <tr>
				    <th scope="col">ID</th>
				    <th scope="col">Nombre</th>
				      
				    </tr>
				  	</thead>
				  	<tbody>
				  	@foreach($role as $roles)
				    <tr>
				      <th scope="row">{{$roles->id}}</th>
				      <td>{{$roles->name}}</td>
			    </tr>
			    @endforeach
			  	</tbody>
			</table>
		</div>
 	</div>
</div>

@endsection