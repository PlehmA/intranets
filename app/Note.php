<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
  protected $fillable = [ 'id', 'id_usuario', 'nombre_nota', 'notas'
  ];

  protected $redirectTo = "/";
}
