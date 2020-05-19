<?php

namespace App\Models\Admin\PersoInformation;

use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    protected $table = 'contacts_informations';
    protected $fillable = [
        'personal_information_id',
        'email',
        'linkedin'
    ];
}
