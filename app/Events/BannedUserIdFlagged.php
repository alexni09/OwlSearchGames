<?php

/*  This event may get itself fired on app\Rules\UserIdBanned.  */

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BannedUserIdFlagged {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $part = null;
    public $status = 0;
    public $ip = null;

    /**
     * Create a new event instance.
     */
    public function __construct(string $part, int $status = 0, string $ip = null) {
        $this->part = $part;
        $this->status = $status;
        $this->ip = $ip ?? request()->ip();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}