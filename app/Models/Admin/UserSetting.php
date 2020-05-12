<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    protected $table = 'user_settings';
    protected $fillable = [
        'dark_mode',
        'user_id',
    ];



    function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
