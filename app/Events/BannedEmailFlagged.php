<?php

/*  This event may get itself fired on app\Rules\EmailBanned.  */

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BannedEmailFlagged {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $part = null;
    public $operation = 0;
    public $ip = null;

    /**
     * Create a new event instance.
     */
    public function __construct(string $part, int $operation = 0, string $ip = null) {
        $this->part = $part;
        $this->operation = $operation;
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