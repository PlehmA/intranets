<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'user_name', 'user_id', 'issue', 'message', 'state_id', 'support_id', 'support_name', 'priority_id', 'user_email'
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
