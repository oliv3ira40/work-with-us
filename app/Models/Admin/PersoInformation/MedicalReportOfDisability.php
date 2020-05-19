<?php

namespace App\Models\Admin\PersoInformation;

use Illuminate\Database\Eloquent\Model;

class MedicalReportOfDisability extends Model
{
    protected $table = 'medicals_reports_of_disabilities';
    protected $fillable = [
        'path'
    ];
}
