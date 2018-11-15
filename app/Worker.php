<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'photo',
        'description',
        'profile_worker',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function recommendations()
    {
        return $this->hasMany('App\Recommendation');
    }

}
