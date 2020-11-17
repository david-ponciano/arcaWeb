@extends('layouts.app')

@section('content')

<div class="container-fluid">


<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">{{$mascota->nombre}}</h1>
    <p class="lead">Fecha de nacimiento: {{$mascota->fechaNac}}</p>
    <p class="lead">Propietario: {{$mascota->id_cliente}}</p>
    <p class="lead">Especie: {{$mascota->id_especie}}</p>
    <p class="lead">Raza: {{$mascota->id_raza}}</p>
    <p class="lead">Sexo: {{$mascota->id_sexo}}</p>
  </div>
</div>
</div>

@endsection