<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recordatory extends Model
{
    protected $fillable = [
    'id_user',
    'user_email',
    'text',
    'username',
    'notification_name',
    'fecha_hora'
];

    protected $hidden = [];
    protected $guarded = ['id'];
}
