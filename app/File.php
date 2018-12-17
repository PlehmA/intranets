<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'nombre', 'url', 'tamanio', 'nomImagen'
    ];
    
    protected $hidden = [
        'id'
    ];

    protected $guarded = [

    ];
    
        
      protected $redirectTo = "/";
}
