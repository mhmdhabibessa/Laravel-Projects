<?php

namespace App\Policies;

use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestimonialPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('Manage Testimonials');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Testimonial  $testimonial
     * @return mixed
     */
    public function view(User $user, Testimonial $testimonial)
    {
        return $user->hasPermissionTo('Manage Testimonials');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Manage Testimonials');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Testimonial  $testimonial
     * @return mixed
     */
    public function update(User $user, Testimonial $testimonial)
    {
        return $user->hasPermissionTo('Manage Testimonials');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Testimonial  $testimonial
     * @return mixed
     */
    public function delete(User $user, Testimonial $testimonial)
    {
        return $user->hasPermissionTo('Manage Testimonials');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Testimonial  $testimonial
     * @return mixed
     */
    public function restore(User $user, Testimonial $testimonial)
    {
        return $user->hasPermissionTo('Manage Testimonials');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Testimonial  $testimonial
     * @return mixed
     */
    public function forceDelete(User $user, Testimonial $testimonial)
    {
        return $user->hasPermissionTo('Manage Testimonials');
    }
}
