<?php

namespace App\Models\Admin\PersoInformation;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';
    protected $fillable = [
        'i_still_dont_have_schooling',

        'schooling_available_id',

        'institution',
        'course',

        'type_of_course_id',
        
        'starting_month',
        'starting_year',
        'conclusion_month',
        'conclusion_year',
    ];
}
