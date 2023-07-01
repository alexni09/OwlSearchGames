<?php

namespace App\Listeners;

use App\Events\UserRequestedAnotherVerificationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\User;

class SendAnotherEmailUpdatedVerificationNotification {
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
    public function handle(UserRequestedAnotherVerificationEmail $event): void {
        if (!$event->user->hasVerifiedEmail()) $event->user->sendEmailVerificationNotification();
    }
}