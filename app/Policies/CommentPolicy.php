<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function edit(User $user, Comment $comments)
    {
        if($comments->user_id === $user->id){
            return true;
        }

        return false;
    }

    public function delete(User $user, Comment $comments)
    {
        if($comments->user_id === $user->id){
            return true;
        }

        return false;
    }
}
