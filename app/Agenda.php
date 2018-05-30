<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
  protected $fillable = [
    'id', 'nombre_agenda', 'col1', 'col2', 'col3', 'col4', 'col5', 'col6', 'col7', 'col8', 'col9', 'id_usr_agenda' ];

    protected $redirectTo = "/";
}
