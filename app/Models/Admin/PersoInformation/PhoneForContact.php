<?php

namespace App\Models\Admin\PersoInformation;

use Illuminate\Database\Eloquent\Model;

class PhoneForContact extends Model
{
    protected $table = 'phones_for_contacts';
    protected $fillable = [
        'contact_information_id',
        
        'telephone'
    ];
}
