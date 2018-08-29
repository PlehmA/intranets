<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'titulo', 'cuerpo', 'foto', 'fecha_noticia',
    ];
    protected $guarded = [
        'id',
    ];
    protected $hidden = [];
}
