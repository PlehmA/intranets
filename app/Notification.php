<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_envia', 'user_recibe', 'descripcion', 'tittle', 'start', 'end', 'allday',
    ];

    protected $guarded = [
        'id'
    ];

    protected $redirectTo = "/";
}
