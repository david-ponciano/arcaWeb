@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
<div class="col-sm-4">

<form action="{{ route('mascotas.store')}}" method="POST">
@csrf
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Escribe el nombre">
  </div>
  <div class="form-group">
    <label for="fechaNac">Nació</label>
    <input type="date" class="form-control" name="fechaNac">
  </div>
  <div class="form-group">
    <label for="id_cliente">Dueño</label>
    <select class="form-control" id="id_cliente" name="id_cliente">
      @foreach($data as $item)
        <option  value="{{$item->id}}">{{$item->name}}</option>
      @endforeach
    </select>
    </div>
  <div class="form-group">
    <label for="id_especie">Especie</label>

    <select class="form-control" id="id_especie" name="id_especie">
      @foreach($dataEs as $itemEs)
        <option value="{{$itemEs->id}}">{{$itemEs->especie}}</option>
      @endforeach
    </select>
    </div>
  <div class="form-group">
    <label for="id_raza">Raza</label>

    <select class="form-control" id="id_raza" name="id_raza">
      @foreach($dataRa as $itemRa)
        <option value="{{$itemRa->id}}">{{$itemRa->raza}}</option>
      @endforeach
    </select>
    </div>
  <div class="form-group">
    <label for="id_sexo">Sexo</label>

    <select class="form-control" id="id_sexo" name="id_sexo">
      @foreach($dataSe as $itemSe)
        <option value="{{$itemSe->id}}">{{$itemSe->sexo}}</option>
      @endforeach
    </select>
    </div>

  <button type="submit" class="btn btn-primary">Registrar</button>
  <button type="reset"  onclick="history.back()" class="btn btn-danger">Cancelar</button>
</form>

</div>
</div>
</div>
@endsection()