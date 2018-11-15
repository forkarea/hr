<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'worker_id',
        'recommendation',
        'author',
        'work_author',
        'profile_author',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function workers()
    {
        return $this->belongsTo('App\Worker');
    }

}
