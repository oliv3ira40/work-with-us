<?php

namespace App\Models\Admin\PersoInformation;

use Illuminate\Database\Eloquent\Model;

class SchoolchildrenAvailable extends Model
{
    protected $table = 'schoolings_availables';
    protected $fillable = [
        'name',
    ];
}
