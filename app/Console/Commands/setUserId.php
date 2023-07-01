<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\UserUpdate;
use App\Models\BannedUserId;

class setUserId extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setUserId {id} {user_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets a user_id; id given.';

    /**
     * Execute the console command.
     */
    public function handle() {
        $id = intval($this->argument('id'));
        $user_id = $this->argument('user_id');
        if ($id <= 0) echo("Error: id is unnaceptable.\nFailed.\n");
        else if (!User::idExists($id)) echo("Error: id ".$id." does not exist.\nFailed.\n");
        else if (strlen($user_id) < User::MAIN_FIELD_MIN_CHARS) echo("Error: Not enough characters for user_id.\nFailed.\n");
        else if (strlen($user_id) > User::MAIN_FIELD_MAX_CHARS) echo("Error: Too many characters for user_id.\nFailed.\n");
        else if (User::userIdExists($user_id)) echo("Error: user_id '".$user_id."' already exists in users table.\nFailed.\n");
        else if (BannedUserId::isBanned($user_id)) echo("Error: user_id '".$user_id."' is currently in a ban list.\nFailed.\n");
        else {
            UserUpdate::addUpdated($id);
            $user = User::find($id);
            $user->update([User::MAIN_FIELD => $user_id]);
            echo("Success!\n");
        }
    }
}