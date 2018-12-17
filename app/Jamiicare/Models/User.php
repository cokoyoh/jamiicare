<?php

namespace Jamiicare;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jamiicare\Models\Role;
use Jamiicare\Models\RoleUser;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
    ];

    protected $dates = [
        'email_verified_at',
        'deleted_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function roleUser()
    {
        return $this->hasMany(RoleUser::class);
    }
}
