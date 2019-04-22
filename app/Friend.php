<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $fillable = [
        'name', 'amigo_de', 'id_user', 'username', 'rol_usuario', 'num_legajo', 'fecha_ingreso', 'fecha_nacimiento', 'puesto', 'email', 'email_personal', 'ip_maquina', 'foto',
        'telefono_particular', 'telefono_celular', 'estado', 'interno',
    ];

    protected $hidden = [
        'password', 
      ];
   
    protected $redirectTo = "/";
}
