<?php

namespace App\Models\Admin\PersoInformation;

use Illuminate\Database\Eloquent\Model;

class TypeOfCourseAvailable extends Model
{
    protected $table = 'types_of_courses_availables';
    protected $fillable = [
        'name',
    ];
}
