<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Company;

class CompanyPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasRole('SuperAdmin');
    }

    public function create(User $user)
    {
        return $user->hasRole('SuperAdmin');
    }

    public function store(User $user)
    {
        return $user->hasRole('SuperAdmin');
    }
}
