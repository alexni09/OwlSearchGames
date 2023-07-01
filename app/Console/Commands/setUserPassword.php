<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\UserUpdate;
use Illuminate\Support\Facades\Hash;

class setUserPassword extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setUserPassword {id} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets a password for the user.';

    /**
     * Execute the console command.
     */
    public function handle() {
        $id = intval($this->argument('id'));
        $password = $this->argument('password');
        if ($id <= 0) echo("Error: id is unnaceptable.\nFailed.\n");
        else if (!User::idExists($id)) echo("Error: id ".$id." does not exist.\nFailed.\n");
        else if (strlen($password) < User::PASSWORD_FIELD_MIN_CHARS) echo("Error: Too few characters for password.\nFailed.\n");
        else {
            UserUpdate::addUpdated($id);
            $user = User::find($id);
            $user->update(['password' => Hash::make($password)]);
            echo("Success!\n");
        }
    }
}