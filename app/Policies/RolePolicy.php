<?php

namespace App\Policies;

use App\Models\User;

class RolePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
    }

    public function assignRole(User $user)
    {
        dd($user->hasRole('admin'));
        return $user->hasRole('admin');
    }
}
