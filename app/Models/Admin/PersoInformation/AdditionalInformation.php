<?php

namespace App\Models\Admin\PersoInformation;

use Illuminate\Database\Eloquent\Model;

class AdditionalInformation extends Model
{
    protected $table = 'additionals_informations';
    protected $fillable = [
        'disability_proven_by_medical_report',
        'medical_report_path',
        'mean_public_vacancie_id',
    ];
}
