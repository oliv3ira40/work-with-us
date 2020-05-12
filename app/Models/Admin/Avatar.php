<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $table = 'avatars';
    protected $fillable = [
        'name',
        'path'
    ];

    

    public function User()
    {
        return $this->hasMany(user::class, 'avatar_id');
    }
}
