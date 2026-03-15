<?php

namespace App\Policies;

use App\Models\Phone;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PhonePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('phone.read');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Phone $phone): bool
    {
        return $user->hasPermissionTo('phone.read');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('phone.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Phone $phone): bool
    {
        return $user->hasPermissionTo('phone.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Phone $phone): bool
    {
        return $user->hasPermissionTo('phone.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Phone $phone): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Phone $phone): bool
    {
        return false;
    }
}
