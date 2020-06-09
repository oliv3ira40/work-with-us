<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';
    protected $fillable = [
        'uf',
        'name'
    ];
}
