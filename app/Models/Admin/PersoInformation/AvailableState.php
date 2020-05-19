<?php

namespace App\Models\Admin\PersoInformation;

use Illuminate\Database\Eloquent\Model;

class AvailableState extends Model
{
    protected $table = 'available_states';
    protected $fillable = [
        'uf',
        'name'
    ];
}
