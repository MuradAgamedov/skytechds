<?php

namespace App\Policies;

use App\Models\AllSeo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AllSeoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('allseo.read');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AllSeo $allseo): bool
    {
        return $user->hasPermissionTo('allseo.read');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('allseo.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AllSeo $allseo): bool
    {
        return $user->hasPermissionTo('allseo.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AllSeo $allseo): bool
    {
        return $user->hasPermissionTo('allseo.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AllSeo $allseo): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AllSeo $allseo): bool
    {
        return false;
    }
}
