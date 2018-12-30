<?php

namespace Jamiicare\Roles;

use Jamiicare\Models\Role;

class RolesRepository
{
    public function getRoleById($id)
    {
        return Role::findOrFail($id);
    }


    public function save(array $input, $id = null)
    {
        if ($id) {
            $role = $this->getRoleById($id);

            $role->update($input);

            return $role->fresh();
        }

        return Role::create($input);
    }
}