<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'email',
        'job_title',
        'company_name',
        'location',
        'type_salary',
        'start_date',
        'percent_work',
        'must_have',
        'nice_have',
        'languages',
        'type_work',
        'project_industry',
        'company_size',
        'project_team_size',
        'percent_workload',
        'day_holiday',
        'office_hours_from',
        'office_hours_to',
        'day_travel',
        'day_relocation',
        'upload_file'

    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
