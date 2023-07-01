<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\UserUpdate;

class setUserName extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setUserName {id} {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets a name for the user. (Note: Use double qutoes for name.)';

    /**
     * Execute the console command.
     */
    public function handle() {
        $id = intval($this->argument('id'));
        $name = $this->argument('name');
        if ($id <= 0) echo("Error: id is unnaceptable.\nFailed.\n");
        else if (!User::idExists($id)) echo("Error: id ".$id." does not exist.\nFailed.\n");
        else if (strlen($name) > User::NAME_FIELD_MAX_CHARS) echo("Error: Too many characters for name.\nFailed.\n");
        else {
            UserUpdate::addUpdated($id);
            $user = User::find($id);
            $user->update(['name' => $name]);
            echo("Success!\n");
        }
    }
}