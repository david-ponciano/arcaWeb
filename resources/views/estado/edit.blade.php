@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
<div class="col-sm-4">

<h3>Editar Estado: {{$estado->estado}}</h3>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('estados.update', $estado->id)}}" method="POST">
@method('PATCH')
@csrf
  <div class="form-group">
    <label for="estado">Estado</label>
    <input type="text" class="form-control" name="estado" value="{{$estado->estado}}">
  </div>
  
  <button type="submit" class="btn btn-primary">Modificar</button>
  <button type="button" onclick="history.back()" class="btn btn-danger">Cancelar</button>
</form>

</div>
</div>
</div>
@endsection()

