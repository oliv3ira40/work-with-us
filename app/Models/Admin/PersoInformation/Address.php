<?php

namespace App\Models\Admin\PersoInformation;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $fillable = [
        'country',
        'zip_code',
        'state',
        'city',
        'street',
        'neighborhood',
        'complement'
    ];
}