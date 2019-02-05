<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = [
        'rol_usuario', 'foto', 'enlace', 'titulo'
    ];

    protected $guarded = [
        'id'
    ];
}
