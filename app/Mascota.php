<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
   protected $table = "mascota";
   protected $fillable = [
        'id', 'nombre','fechaNac', 'id_cliente', 'id_especie','id_raza','id_sexo'
    ];
}
