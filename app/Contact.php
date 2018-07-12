<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  protected $fillable = [ 'id', 'id_usuario', 'nomyap', 'correo', 'direccion', 'provincia', 'partido', 'localidad', 'tellinea', 'telcel', 'interno',
  ];

  /**
 *
 * Scopes para el filtrado de busqueda by Andres
 *
 */
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
 public function scopeDireccion($query, $direccion){
 if ($direccion)
 return $query->where('direccion', 'ILIKE', "%$direccion%");
 }
}
