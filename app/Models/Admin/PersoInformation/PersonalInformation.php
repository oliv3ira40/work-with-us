<?php

namespace App\Models\Admin\PersoInformation;

use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    protected $table = 'personal_informations';
    protected $fillable = [
        'curriculum_id',

        'path_profile_picture',
        'full_name',
        'date_of_birth',
        'rg',
        'cpf',
        
        'address_id',
        'wage_claim_id',
        'education_id',
        'additional_information_id',
    ];
}
