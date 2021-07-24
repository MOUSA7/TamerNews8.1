<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {

    }


    public function view(User $user, User $model)
    {
        //
    }

    public function create(User $user)
    {
        if ($user->role->id == 3){
            dd($user->role->id);
        }
    }


    public function update(User $user, User $model)
    {
        if (auth()->user()->role_id == 1) {
            return true;
        }else{
            return false;
        }

    }


    public function delete(User $user, User $model)
    {
        //
    }


    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
