<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cred extends Model
{
    protected $fillable = [
        'user_id','valor_cred',
    ];
}
