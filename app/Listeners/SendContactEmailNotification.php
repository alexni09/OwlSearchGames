<?php

namespace App\Listeners;

use App\Events\ContactEmailSent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\SendContactEmail;
use Illuminate\Support\Facades\Notification;

class SendContactEmailNotification implements ShouldQueue {
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactEmailSent $event): void {
        Notification::route('mail', $event->send_to)->notify(new SendContactEmail($event));
    }
}