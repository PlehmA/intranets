<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = [
      'id', 'id_usuario', 'tittle', 'descripcion', 'start', 'end', 'color', 'textcolor', 'allday', 'fecha_hora'
    ];
    protected $redirectTo = "/";
}
