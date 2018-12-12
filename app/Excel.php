<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excel extends Model
{
    protected $fillable = [
        'id_programa', 'titulo', 'foto_video', 'video'
      ];
      protected $guarded = [
          'id'
      ];
    
      protected $redirectTo = "/";
}
