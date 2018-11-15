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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function recommendations()
    {
        return $this->hasMany('App\Recommendation');
    }

    public function workers()
    {
        return $this->hasMany('App\Worker');
    }

    public function applications()
    {
        return $this->hasMany('App\Application');
    }

}
