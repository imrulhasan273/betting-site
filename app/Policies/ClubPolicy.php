<?php

namespace App\Policies;

use App\Club;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClubPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        // dd('dd');
        $roles = Auth::check() ? Auth::user()->role->pluck('name')->toArray() : [];
        if (($roles[0] == 'admin') || ($roles[0] == 'super_admin')) {
            return true;
        }
    }
    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Club  $club
     * @return mixed
     */
    public function view(User $user, Club $club)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    public function edit(User $user, Club $club)
    {
        //logic need to be changed
        return $user->id == $club->user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Club  $club
     * @return mixed
     */
    public function update(User $user, Club $club)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Club  $club
     * @return mixed
     */
    public function delete(User $user, Club $club)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Club  $club
     * @return mixed
     */
    public function restore(User $user, Club $club)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Club  $club
     * @return mixed
     */
    public function forceDelete(User $user, Club $club)
    {
        //
    }
}
