<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'from', 'to', 'last_message', 'last_time'
    ];
    protected $guarded = [
        'id',
    ];
    protected $hidden = [

    ];

    protected $redirectTo = "/";
}
