<?php

namespace App\Models\Admin\PersoInformation;

use Illuminate\Database\Eloquent\Model;

class CurrencyAvailable extends Model
{
    protected $table = 'currencies_available';
    protected $fillable = [
        'code',
        'currency'
    ];
}
