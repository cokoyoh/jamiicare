<?php

namespace Jamiicare\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $fillable = [
        'name',
        'description'
    ];

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function permissionRole()
    {
        return $this->hasMany(PermissionRole::class);
    }
}
