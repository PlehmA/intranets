<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'titulo', 'cuerpo', 'foto', 'fecha_noticia','atajo'
    ];
    protected $guarded = [
        'id',
    ];
    protected $hidden = [];

    protected $redirectTo = "/";
}
