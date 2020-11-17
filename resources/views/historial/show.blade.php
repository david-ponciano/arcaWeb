@extends('layouts.app')

@section('content')

<div class="container-fluid">


<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">{{$historial->fechaSer}}</h1>
    <p class="lead">Propietario: {{$historial->id_cliente}}</p>
    <p class="lead">Mascota: {{$historial->id_mascota}}</p>
    <p class="lead">Servicio: {{$historial->id_servicio}}</p>
    <p class="lead">Est. Reproducción: {{$historial->id_estado}}</p>
    <p class="lead">Motivo: {{$historial->motivo}}</p>
    <p class="lead">Problema: {{$historial->problema}}</p>
    <p class="lead">Diagnóstico: {{$historial->diagnóstico}}</p>
  </div>
</div>
</div>

@endsection