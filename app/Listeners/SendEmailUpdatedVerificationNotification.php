<?php

namespace App\Listeners;

use App\Events\UserUpdatedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\User;

class SendEmailUpdatedVerificationNotification {
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
    public function handle(UserUpdatedEmail $event): void {
        /* $event->user instanceof MustVerifyEmail didn't work inside the if clause here: */
        if (!$event->user->hasVerifiedEmail()) $event->user->sendEmailVerificationNotification();
    }
}
