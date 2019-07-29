<?php

namespace App\Policies;

use App\User;
use App\Roles;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolesPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any roles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the roles.
     *
     * @param  \App\User  $user
     * @param  \App\Roles  $roles
     * @return mixed
     */
    public function view(User $user, Roles $roles)
    {
        //
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return in_array('Admin',$user->roles->pluck('name')->all());
    }

    /**
     * Determine whether the user can update the roles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
        return in_array('Admin',$user->roles->pluck('name')->all());
    }

    /**
     * Determine whether the user can delete the roles.
     *
     * @param  \App\User  $user
     * @param  \App\Roles  $roles
     * @return mixed
     */
    public function delete(User $user, Roles $roles)
    {
        //
    }

    /**
     * Determine whether the user can restore the roles.
     *
     * @param  \App\User  $user
     * @param  \App\Roles  $roles
     * @return mixed
     */
    public function restore(User $user, Roles $roles)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the roles.
     *
     * @param  \App\User  $user
     * @param  \App\Roles  $roles
     * @return mixed
     */
    public function forceDelete(User $user, Roles $roles)
    {
        //
    }
}
