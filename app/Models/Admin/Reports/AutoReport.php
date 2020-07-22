<?php

namespace App\Models\Admin\Reports;

use Illuminate\Database\Eloquent\Model;

class AutoReport extends Model
{
    protected $table = 'auto_reports';
    protected $fillable = [
        'name',
        'name_slug',
        'path_file_pdf',
        'path_file_docx',
        'user_id'
    ];



    function User() {
        return $this->belongsTo('App\Models\Admin\User', 'user_id');
    }
}