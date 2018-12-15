<?php

namespace Jamiicare\Models;

use Illuminate\Database\Eloquent\Model;
use Jamiicare\User;

class RoleUser extends Model
{
    protected $table = 'role_user';

    protected $fillable = [
        'role_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
