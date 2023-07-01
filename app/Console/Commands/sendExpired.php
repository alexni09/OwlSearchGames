<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Events\PasswordExpired;

class sendExpired extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sendexpired {user_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends a password expired notification towards the user.';

    /**
     * Execute the console command.
     */
    public function handle() {
        $user_id = $this->argument('user_id');
        $user = User::where('user_id', $user_id)->get()[0];
        event(new PasswordExpired($user));
        echo("The End.\n");
    }
}