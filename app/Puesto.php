<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'nombre_puesto',
    ];

    protected $guarded = [
      'id', 
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    protected $redirectTo = "/";
}
