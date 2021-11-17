<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Notice;
use App\User;

class NoticePolicy
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

    public function noticeUpdate(User $user, Notice $notice)
    {
        return $user->id == $notice->user_id;
    }
}
