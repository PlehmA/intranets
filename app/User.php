<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'rol_usuario', 'tipo_rol', 'num_legajo', 'fecha_ingreso', 'fecha_nacimiento', 'puesto', 'email', 'email_personal', 'ip_maquina', 'foto',
        'telefono_particular', 'telefono_celular', 'cuil', 'estado', 'interno',
    ];

    protected $guarded = [
      'id', 
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token', 'password'
    ];
    protected $redirectTo = "/";
    /**
    *
    * Scopes para el filtrado de busqueda by Andres
    *
    */
    public function scopeName($query, $name)
    {
      if ($name)
      return $query->where('name', 'ILIKE', "%$name%");
    }
    public function scopeEmail($query, $email)
    {
      if ($email)
      return $query->where('email', 'ILIKE', "%$email%");
    }
    public function scopeArea($query, $area)
    {
      if ($area)
      return $query->where('puesto', 'ILIKE', "%$area%");
    }
}
