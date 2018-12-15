<?php

namespace Jamiicare\Models;

use Illuminate\Database\Eloquent\Model;
use Jamiicare\User;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
        'description'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function roleUser()
    {
        return $this->hasMany(RoleUser::class);
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

    public function permissionRole()
    {
        return $this->hasMany(PermissionRole::class);
    }
}
