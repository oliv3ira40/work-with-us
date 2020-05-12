<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = [
        'group_id',
        'created_permission_id'
    ];



    function Group() {
        return $this->belongsTo(Group::class, 'group_id');
    }

    function CreatedPermission() {
        return $this->belongsTo(CreatedPermission::class, 'created_permission_id');
    }
}
