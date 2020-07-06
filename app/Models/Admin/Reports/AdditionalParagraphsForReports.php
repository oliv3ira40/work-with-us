<?php

namespace App\Models\Admin\Reports;

use Illuminate\Database\Eloquent\Model;

class AdditionalParagraphsForReports extends Model
{
    protected $table = 'additional_paragraphs_for_reports';
    protected $fillable = [
        'title',
        'description'
    ];
}