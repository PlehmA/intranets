<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'id_tuto', 'title', 'thumbnail', 'video'
      ];
    
      protected $redirectTo = "/";
}
