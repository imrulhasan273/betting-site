<?php

namespace App\Policies;

use App\User;
use App\WebMessageAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class WebMessageAdminPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
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
     * @param  \App\WebMessageAdmin  $webMessageAdmin
     * @return mixed
     */
    public function view(User $user, WebMessageAdmin $webMessageAdmin)
    {
        return $user->id == $webMessageAdmin->user_id;
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

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\WebMessageAdmin  $webMessageAdmin
     * @return mixed
     */
    public function update(User $user, WebMessageAdmin $webMessageAdmin)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\WebMessageAdmin  $webMessageAdmin
     * @return mixed
     */
    public function delete(User $user, WebMessageAdmin $webMessageAdmin)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\WebMessageAdmin  $webMessageAdmin
     * @return mixed
     */
    public function restore(User $user, WebMessageAdmin $webMessageAdmin)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\WebMessageAdmin  $webMessageAdmin
     * @return mixed
     */
    public function forceDelete(User $user, WebMessageAdmin $webMessageAdmin)
    {
        //
    }
}
