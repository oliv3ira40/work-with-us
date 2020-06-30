<?php

namespace App\Models\Admin\AutoReports;

use Illuminate\Database\Eloquent\Model;

class standardColumnAutoReport extends Model
{
    protected $table = 'standard_columns_auto_reports';
    protected $fillable = [
        'name',
        'report_objective_description',
        'clarifications_recommendations'
    ];
}