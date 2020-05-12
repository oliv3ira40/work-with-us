<?php

namespace App\Models\Admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'first_name',
        'last_name',
        'login',
        'email',
        'telephone',
        'cpf',
        'date_of_birth',
        'password',
        'group_id',
        'avatar_id',
        'deleted_at'
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $dates = ['deleted_at'];

 
 
    function Group() {
        return $this->belongsTo(Group::class, 'group_id');
    }

    // Peoples
        function Professional() {
            return $this->hasOne('App\Models\Peoples\Professional', 'user_id');
        }
        function Office() {
            return $this->hasOne('App\Models\Peoples\Office', 'user_id');
        }
        function Shopkeeper() {
            return $this->hasOne('App\Models\Peoples\Shopkeeper', 'user_id');
        }
    // Peoples

    function UserSetting()
    {
        return $this->HasOne(UserSetting::class, 'user_id');
    }

    public function Avatar()
    {
        return $this->belongsTo(Avatar::class, 'avatar_id');
    }
}