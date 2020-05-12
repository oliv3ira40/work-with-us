<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    protected $fillable = [
        'hierarchy_level',
        'name',
        'tag',
        'tag_color',
    ];



    function User() {
        return $this->hasMany(User::class, 'group_id');
    }

    function Permission() {
        return $this->hasMany(Permission::class, 'group_id');
    }
}
