<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\User;
use App\Blog;

class UserMakeBlog
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user;
    public $blog;
    public $admin;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Blog $blog, $admin)
    {
        //
        $this->blog = $blog;
        $this->user = $user;
        $this->admin = $admin;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
