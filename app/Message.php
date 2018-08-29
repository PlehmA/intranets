<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
            'content', 'listen_notifications', 'has_blocked', 'last_message', 'last_time',
    ];
    protected $guarded = [
        'id', 'from_id', 'to_id',
    ];
    protected $hidden = [

    ];

}
