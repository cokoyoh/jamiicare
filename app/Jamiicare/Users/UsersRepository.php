<?php

namespace Jamiicare\Users;

use Jamiicare\Models\Role;
use Jamiicare\Models\User;

class UsersRepository
{
    public function getUserById($id)
    {
        return User::findOrFail($id);
    }

    public function attachRole(User $user, Role $role)
    {
        $user->roles()->attach($role);
    }

    public function save(array $input, $id = null)
    {
        if($id){
            $user = $this->getUserById($id);

            $user->update($input);

            return $user->fresh();
        }

        return User::create($input);
    }
}