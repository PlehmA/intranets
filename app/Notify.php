<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    protected $fillable = [
        'data', 'user_envia_id', 'user_recibe_id', 'leido',
    ];
    
    protected $guarded = [
        'id'
    ];

    protected $hidden = [];

    protected $redirectTo = "/";
}
