<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Events\PasswordExpired;
use App\Jobs\SendPasswordExpiredNotification;

class sendExpired extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sendExpired {user_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Expires the user and sends a password expired notification towards the user.';

    /**
     * Execute the console command.
     */
    public function handle() {
        $user_id = $this->argument('user_id');
        $user = User::where('user_id', $user_id)->get()[0];
        $user->update([ User::STATUS_FIELD => User::STATUS_FIELD_PASSWORD_EXPIRED ]);
        event(new PasswordExpired($user));
        SendPasswordExpiredNotification::dispatch($user);
        echo("The End.\n");
    }
}