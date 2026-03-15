<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Testimonial\Testimonial;

class TestimonialPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('testimonial.read');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Testimonial $testimonial): bool
    {
        return $user->hasPermissionTo('testimonial.read');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('testimonial.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Testimonial $testimonial): bool
    {
        return $user->hasPermissionTo('testimonial.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Testimonial $testimonial): bool
    {
        return $user->hasPermissionTo('testimonial.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Testimonial $testimonial): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Testimonial $testimonial): bool
    {
        return false;
    }
}
