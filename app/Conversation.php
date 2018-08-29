<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        
        'listen_notifications', 'has_blocked', 'last_message', 'last_time',
        
    ];
    protected $guarded = [
        'id', 'user_id', 'contact_id',
    ];
    protected $hidden = [

    ];
}
