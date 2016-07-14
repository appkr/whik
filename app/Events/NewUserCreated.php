<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewUserCreated extends Event implements ShouldBroadcast
{
    use SerializesModels;

    /**
     * @var array
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param array $user
     */
    public function __construct(array $user)
    {
        $this->user = $user;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [
            'whik'
        ];
    }
}