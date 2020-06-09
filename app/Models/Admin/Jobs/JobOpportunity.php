<?php

namespace App\Models\Admin\Jobs;

use Illuminate\Database\Eloquent\Model;

class JobOpportunity extends Model
{
    protected $table = 'job_opportunities';
    protected $fillable = [
        'name',
        'occupation_area',
        'description',
        'state_id',
        'city_id',
    ];



    public function State()
    {
        return $this->belongsTo('App\Models\Address\State', 'state_id');
    }
    public function City()
    {
        return $this->belongsTo('App\Models\Address\City', 'city_id');
    }
}