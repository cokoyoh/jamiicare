<?php

namespace Jamiicare\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
        'description'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
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
