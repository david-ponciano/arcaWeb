@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
<div class="col-sm-4">

<form action="{{ route('historiales.store')}}" method="POST">
@csrf
  <div class="form-group">
    <label for="id_cliente">Dueño</label>
    <select class="form-control" id="id_cliente" name="id_cliente">
      @foreach($data as $item)
        <option  value="{{$item->id}}">{{$item->name}}</option>
      @endforeach
    </select>
    </div>
  <div class="form-group">
    <label for="id_mascota">Mascota</label>
    <select class="form-control" id="id_mascota" name="id_mascota">
      @foreach($dataMas as $itemMas)
        <option value="{{$itemMas->id}}">{{$itemMas->nombre}}</option>
      @endforeach
    </select>
    </div>
     <div class="form-group">
    <label for="id_servicio">Servicio</label>
    <select class="form-control" id="id_servicio" name="id_servicio">
      @foreach($dataSer as $itemSer)
        <option value="{{$itemSer->id}}">{{$itemSer->servicio}}</option>
      @endforeach
    </select>
    </div>
    <div class="form-group">
    <label for="id_estado">Est. Reproducción</label>
    <select class="form-control" id="id_estado" name="id_estado">
      @foreach($dataEs as $itemEs)
        <option value="{{$itemEs->id}}">{{$itemEs->estado}}</option>
      @endforeach
    </select>
    </div>
    <div class="form-group">
    <label for="fechaSer">Fecha</label>
    <input type="date" class="form-control" name="fechaSer">
    </div>
    <div class="form-group">
    <label for="motivo">Motivo</label>
    <input type="textarea" class="form-control" name="motivo">
    </div><div class="form-group">
    <label for="problema">Problema</label>
    <input type="textarea" class="form-control" name="problema">
    </div><div class="form-group">
    <label for="diagnostico">Diagnóstico</label>
    <input type="textarea" class="form-control" name="diagnostico">
    </div>

  <button type="submit" class="btn btn-primary">Registrar</button>
  <button type="reset"  onclick="history.back()" class="btn btn-danger">Cancelar</button>
</form>

</div>
</div>
</div>
@endsection()