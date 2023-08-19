<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SendUnverifiedUserNotificationToAdmins;

class sendUnverified extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sendUnverified';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispatches the job for sending email to admins about unverified users.';

    /**
     * Execute the console command.
     */
    public function handle() {
        SendUnverifiedUserNotificationToAdmins::dispatch();
    }
}