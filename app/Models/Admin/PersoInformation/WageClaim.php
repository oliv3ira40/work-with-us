<?php

namespace App\Models\Admin\PersoInformation;

use Illuminate\Database\Eloquent\Model;

class WageClaim extends Model
{
    protected $table = 'wages_claims';
    protected $fillable = [
        'currencie_available_id',
        
        'value'
    ];
}
