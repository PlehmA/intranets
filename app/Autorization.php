<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autorization extends Model
{
    protected $fillable = [
        'nombre_usuario', 'user_id', 'tipo_autorizacion','rol_usuario', 'sector', 'autorizacion_id', 'fecha_de', 'fecha_hasta', 'calle', 'numero', 'piso', 'depto', 'motivo', 
        'cod_postal', 'entrecalles', 'localidad', 'provincia', 'telefono', 'estado_jefe', 'estado_rrhh', 'fecha_creacion'
    ];
    protected $guarded = [
        'id',
    ];
    protected $hidden = [];
}
