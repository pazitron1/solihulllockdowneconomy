<?php

namespace App\Policies;

use App\Business;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BusinessPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Business $business)
    {
        return $business->user->is($user);
    }

    public function limit(User $user)
    {
        return $user->businesses()->count() < 10;
    }

}


