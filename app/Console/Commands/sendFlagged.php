<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\sendFlaggedEmailsToAdmins;

class sendFlagged extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sendFlagged';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispatches the job for sending flagged emails to admins.';

    /**
     * Execute the console command.
     */
    public function handle() {
        sendFlaggedEmailsToAdmins::dispatch();
    }
}