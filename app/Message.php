<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'from', 'to', 'text'
    ];
    protected $guarded = [
        'id', 
    ];
    protected $hidden = [

    ];

    protected $redirectTo = "/";

}
