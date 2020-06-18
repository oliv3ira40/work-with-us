<?php

namespace App\Models\Admin\PersoInformation;

use Illuminate\Database\Eloquent\Model;

class SchoolingAvailable extends Model
{
    protected $table = 'schoolings_availables';
    protected $fillable = [
        'compound_register',
        'name',
    ];
}
