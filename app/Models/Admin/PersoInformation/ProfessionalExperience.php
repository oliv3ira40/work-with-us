<?php

namespace App\Models\Admin\PersoInformation;

use Illuminate\Database\Eloquent\Model;

class ProfessionalExperience extends Model
{
    protected $table = 'professionals_experiences';
    protected $fillable = [
        'personal_information_id',

        'i_dont_have_experience',
        'office',
        'company',
        
        'currencie_available_id',
        
        'value',
        'description',
        'starting_month',
        'starting_year',
        'work_here_currently',
        'conclusion_month',
        'conclusion_year',
        'benefits',
        
        'type_of_contract_id',
    ];
}
