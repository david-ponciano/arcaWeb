<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table = "historial";
   protected $fillable = [
        'id', 'id_cliente','id_mascota','id_servicio','id_estado','fechaSer','motivo','problema','diagnostico'
    ];
}
