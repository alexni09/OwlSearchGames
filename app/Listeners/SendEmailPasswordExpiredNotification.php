<?php

namespace App\Listeners;

use App\Events\PasswordExpired;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Notifications\VerifyPasswordExpired;

class SendEmailPasswordExpiredNotification implements ShouldQueue {
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
    public function handle(PasswordExpired $event): void {
        $user = $event->user;
        if ($user->status === User::STATUS_FIELD_PASSWORD_EXPIRED) $user->notify(new VerifyPasswordExpired($user));
    }
}