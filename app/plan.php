<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    protected $fillable = [
        'id_user','id_servicio','cant_pantalla', 'usuario','contrasena','perfil', 'valor',
    ];
}
