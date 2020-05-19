<?php

namespace App\Models\Admin\PersoInformation;

use Illuminate\Database\Eloquent\Model;

class TypeOfContractAvailable extends Model
{
    protected $table = 'types_of_contracts_availables';
    protected $fillable = [
        'name',
    ];
}
