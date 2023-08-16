<?php

/* 
    This is currently being used only as a wrapper.
    The event() helper was removed.
    Contact emails are now being sent via a job. 
*/

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Valve;

class ContactEmailSent {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id = null;
    public $name = null;
    public $email = null;
    public $message = null;
    public $send_to = null;

    /**
     * Create a new event instance.
     */
    public function __construct(string $name, string $email, string $message, string $user_id = null) {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
        $this->user_id = $user_id;
        if (!Valve::exists('contact_email')) $this->send_to = env('MAIL_USERNAME');
        else $this->send_to = Valve::getValue('contact_email');
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