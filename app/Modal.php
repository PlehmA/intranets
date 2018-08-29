<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modal extends Model
{
    protected $fillable = [ 
        'user_id', 'readed', 'readed_time'
    ];

    protected $guarded = [
        'id', 
    ];

    protected $hidden = [];
}
