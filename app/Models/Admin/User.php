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
        'personal_information_id',
        'first_name',
        'last_name',
        'login',
        'email',
        'telephone',
        'cpf',
        'date_of_birth',
        'password',
        'deleted_at',
        'group_id',
        'avatar_id'
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

    function UserSetting()
    {
        return $this->HasOne(UserSetting::class, 'user_id');
    }

    public function Avatar()
    {
        return $this->belongsTo(Avatar::class, 'avatar_id');
    }

    function PersonalInformation()
    {
        return $this->belongsTo(PersoInformation\PersonalInformation::class, 'personal_information_id');
    }

    function AutoReport() {
        return $this->hasMany('App\Models\Admin\Reports\AutoReport', 'user_id');
    }
}