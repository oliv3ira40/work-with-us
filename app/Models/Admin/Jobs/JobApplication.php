<?php

namespace App\Models\Admin\Jobs;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $table = 'job_applications';
    protected $fillable = [
        'user_id',
        'job_opportunity_id',
    ];
}