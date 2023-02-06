<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $fillable = [
        'id_usuario_cuenta','nombre_cuenta','tiempo_cuenta', 'precio_cuenta','cant_pantalla',
    ];
}
