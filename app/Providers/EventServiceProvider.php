<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\PasswordExpired;
use App\Listeners\SendEmailPasswordExpiredNotification;
use App\Events\UserUpdatedEmail;
use App\Listeners\SendEmailUpdatedVerificationNotification;
use App\Events\UserRequestedAnotherVerificationEmail;
use App\Listeners\SendAnotherEmailUpdatedVerificationNotification;
use App\Events\BannedEmailFlagged;
use App\Listeners\LogBannedEmail;
use App\Events\BannedUserIdFlagged;
use App\Listeners\LogBannedUserId;
use App\Events\ContactEmailSent;
use App\Listeners\SendContactEmailNotification;

class EventServiceProvider extends ServiceProvider {
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        BannedEmailFlagged::class => [
            LogBannedEmail::class
        ],
        BannedUserIdFlagged::class => [
            LogBannedUserId::class
        ],
        ContactEmailSent::class => [
            SendContactEmailNotification::class
        ],
        PasswordExpired::class => [
            SendEmailPasswordExpiredNotification::class
        ],
        Registered::class => [
            SendEmailVerificationNotification::class
        ],
        UserUpdatedEmail::class => [
            SendEmailUpdatedVerificationNotification::class
        ],
        UserRequestedAnotherVerificationEmail::class => [
            SendAnotherEmailUpdatedVerificationNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}