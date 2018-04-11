<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['id', 'user_envia_id', 'user_recibe_id', 'user_envia_name', 'user_recibe_name', 'hora_msj', 'mensaje'];

}
