<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
   protected $table = "especie";
   protected $fillable = [
        'id', 'especie'
    ];
}
