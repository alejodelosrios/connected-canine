<?php

namespace App\Policies;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicationPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Pet $pet)
    {
        return $user->id == $pet->owner->id;
    }

    public function delete(User $user, Pet $pet)
    {
        return $user->id == $pet->owner->id;
    }
}
