<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Columna extends Model
{
  protected $fillable = [ 'id', 'id_agenda', 'nombre_agenda', 'nomyap', 'correo', 'direccion', 'provincia', 'partido', 'localidad', 'tellinea', 'telcel', 'interno', 'id_usuario'
  ];

  protected $redirectTo = "/";

  
}
