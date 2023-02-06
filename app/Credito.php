<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    protected $fillable = [
        'user_id','credito_foto','credito_codigo','revisado','credito_comentario',
    ];
}
