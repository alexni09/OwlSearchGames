<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\UserUpdate;
use App\Models\BannedEmail;

class setUserEmail extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setUserEmail {id} {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets an email for the user.';

    /**
     * Execute the console command.
     */
    public function handle() {
        $id = intval($this->argument('id'));
        $email = $this->argument('email');
        if ($id <= 0) echo("Error: id is unnaceptable.\nFailed.\n");
        else if (!User::idExists($id)) echo("Error: id ".$id." does not exist.\nFailed.\n");
        else if (strlen($email) > User::EMAIL_FIELD_MAX_CHARS) echo("Error: Too many characters for email.\nFailed.\n");
        else if (User::emailExists($email)) echo("Error: email '".$email."' already exists in users table.\nFailed.\n");
        else if (BannedEmail::isBanned($email)) echo("Error: email '".$email."' is currently in a ban list.\nFailed.\n");
        else {
            UserUpdate::addUpdated($id);
            $user = User::find($id);
            $user->update(['email' => $email]);
            echo("Success!\n");
        }
    }
}