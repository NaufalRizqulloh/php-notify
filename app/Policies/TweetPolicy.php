<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TweetPolicy
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
    public function edit(User $user, Tweet $tweets){
        if($tweets->user_id === $user->id){
            return true;
        }

        return false;
    }

    public function delete(User $user, Tweet $tweets){
        if($tweets->user_id === $user->id){
            return true;
        }

        return false;
    }
}
