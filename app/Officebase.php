<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Officebase extends Model
{
  protected $fillable = [
    'id', 'id_programa', 'titulo', 'foto_video', 'video'
  ];

  protected $redirectTo = "/";
}
