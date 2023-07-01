<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\UserUpdate;

class getIdFromUserId extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:getIdFromUserId {user_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Returns the user's id, user_id given.";

    /**
     * Execute the console command.
     */
    public function handle() {
        $user_id = $this->argument('user_id');
        if (!User::userIdExists($user_id)) {
            echo("Error: user_id '".$user_id."' doesn't exist in users table.\nFailed.\n");
            $boo = UserUpdate::existsDeletedUserId($user_id);
            if ($boo) echo("Note: user_id '".$user_id."' has been found deleted.\n");
        } else {
            $id = User::getIdFromUserId($user_id);
            echo("===> ".$user_id."'s id is ".$id.".\n");
        }
    }
}