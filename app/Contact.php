<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  protected $fillable = [ 'id', 'id_usuario', 'nomyap', 'correo', 'direccion', 'provincia', 'partido', 'localidad', 'tellinea', 'telcel', 'interno',
  ];

  public function scopeNomyap($query, $nomyap)
  {
    if ($nomyap)
    return $query->where('nomyap', 'ILIKE', "%$nomyap%");
  }
  public function scopeCorreo($query, $correo)
  {
    if ($correo)
    return $query->where('correo', 'ILIKE', "%$correo%");
  }
  public function scopeLocalidad($query, $localidad)
  {
    if ($localidad)
    return $query->where('localidad', 'ILIKE', "%$localidad%");
  }
}
