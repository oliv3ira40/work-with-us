<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CreatedPermission extends Model
{
    protected $table = 'created_permissions';
    protected $fillable = [
        'name',
        'route'
    ];



    function Permission() {
        return $this->hasMany(Permission::class, 'created_permission_id');
    }
}
