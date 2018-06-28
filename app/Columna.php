<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Columna extends Model
{
  protected $fillable = [ 'id', 'id_agenda', 'nombre_agenda', 'nomyap', 'correo', 'direccion', 'provincia', 'partido', 'localidad', 'tellinea', 'telcel', 'interno', 'id_usuario'
  ];

  protected $redirectTo = "/";

  /**
  *
  * Scopes para el filtrado de busqueda
  *
  */
  public function scopeName($query, $name)
  {
    if ($name)
    return $query->where('nomyap', 'ILIKE', "%$name%");
  }
  public function scopeEmail($query, $email)
  {
    if ($email)
    return $query->where('correo', 'ILIKE', "%$email%");
  }
  public function scopeArea($query, $area)
  {
    if ($provincia)
    return $query->where('provincia', 'ILIKE', "%$provincia%");
  }

}
