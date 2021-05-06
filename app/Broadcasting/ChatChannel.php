<?php

namespace App\Broadcasting;

use App\User;
use App\Message;
use Illuminate\Support\Facades\Auth;

class ChatChannel
{
    public $user;
    public $message;
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct(User $user, Message $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\User  $user
     * @return array|bool
     */
    public function join()
    {
        return $this->user->id === $this->message->user_id;
    }
}
