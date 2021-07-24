<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        if (auth()->user()->role_id <= 2){
            return true;
        }
    }


    public function view(User $user, Post $post)
    {

    }


    public function create(User $user)
    {
        if (auth()->user()->role_id <=2){
            return true;
        }
    }


    public function update(User $user, Post $post)
    {
        return false;
    }

    public function delete(User $user, Post $post)
    {
        return true;
    }


    public function restore(User $user, Post $post)
    {
        //
    }


    public function forceDelete(User $user, Post $post)
    {
        //
    }
}
