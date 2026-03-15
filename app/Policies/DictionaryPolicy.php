<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Dictionary\Dictionary;
use Illuminate\Auth\Access\Response;

class DictionaryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('dictionary.read');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Dictionary $dictionary): bool
    {
        return $user->hasPermissionTo('dictionary.read');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('dictionary.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Dictionary $dictionary): bool
    {
        return $user->hasPermissionTo('dictionary.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Dictionary $dictionary): bool
    {
        return $user->hasPermissionTo('dictionary.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Dictionary $dictionary): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Dictionary $dictionary): bool
    {
        return false;
    }
}
