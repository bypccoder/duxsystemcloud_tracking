<?php

namespace App\Services;

use App\Models\User;
use App\Models\Role;

class RoleAssignmentService
{
    public function assignRoleToUser(User $user, Role $role)
    {
        $user->roles()->attach($role->id);
    }
}

?>
