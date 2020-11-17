@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
<div class="col-sm-4">

<form action="{{ route('estados.store')}}" method="POST">
@csrf
  <div class="form-group">
    <label for="estado">Estado</label>
    <input type="text" class="form-control" name="estado" placeholder="Escribe el estado de reproducción">
  </div>

  <button type="submit" class="btn btn-primary">Registrar</button>
  <button type="reset" onclick="history.back()" class="btn btn-danger">Cancelar</button>
</form>

</div>
</div>
</div>
@endsection()