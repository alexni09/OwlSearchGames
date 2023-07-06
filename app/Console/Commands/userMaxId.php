<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class userMaxId extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:userMaxId';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Displays the max id from the users table and some other fields.';

    /**
     * Execute the console command.
     */
    public function handle() {
        $id = User::getMaxId();
        $user = User::find($id);
        echo('id: ' . strval($user['id']) . "\n");
        echo('user_id: ' . $user['user_id']. "\n");
        echo('name: ' . $user['name']. "\n");
        echo('email: ' . $user['email']. "\n");
    }
}