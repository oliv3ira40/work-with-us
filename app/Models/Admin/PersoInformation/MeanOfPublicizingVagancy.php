<?php

namespace App\Models\Admin\PersoInformation;

use Illuminate\Database\Eloquent\Model;

class MeanOfPublicizingVagancy extends Model
{
    protected $table = 'means_of_publicizing_vacancies';
    protected $fillable = [
        'name',
    ];
}
