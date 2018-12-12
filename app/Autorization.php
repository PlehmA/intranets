<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autorization extends Model
{
    protected $fillable = [
        'nombre_usuario', 'user_id', 'tipo_autorizacion','rol_usuario', 'sector', 'autorizacion_id', 'fecha_de', 'fecha_hasta', 'materia', 'calle', 'numero', 'piso', 'depto', 'motivo', 
        'cod_postal', 'entrecalles', 'localidad', 'provincia', 'telefono', 'estado_jefe', 'estado_rrhh', 'cuil', 'fecha_creacion', 'legajo', 'hora_de', 'hora_hasta', 'tipo_ro'
    ];
    protected $guarded = [
        'id',
    ];
    protected $hidden = [];

    protected $redirectTo = "/";
}
