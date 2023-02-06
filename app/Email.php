<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = [
        'id_servicio','email_nombre', 'email_contrasena','email_tiempo','email_comentario','email_cant_pantalla',
    ];
}
