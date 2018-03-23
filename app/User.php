<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'rol_usuario', 'num_legajo', 'fecha_ingreso', 'fecha_nacimiento', 'puesto', 'email', 'email_personal', 'ip_maquina', 'foto',
        'telefono_particular', 'telefono_celular',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function friendsOfMine()
    {
        return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id');
    }
    public function friendsOf()
    {
        return $this->belongsToMany('App\User', 'friends', 'friend_id', 'user_id');
    }
    public function friends(){
        return $this->friendsOfMine->merge($this->friendsOf);
    }
}
