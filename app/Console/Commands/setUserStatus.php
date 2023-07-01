<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\UserUpdate;

class setUserStatus extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setUserStatus {user_id} {status}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets the user status.';

    /**
     * Execute the console command.
     */
    public function handle() {
        $id = User::getIdFromUserId($this->argument('user_id'));
        if (!$id) echo("ERROR: user_id no found.\n");
        else {
            UserUpdate::addUpdated($id);
            User::updateStatus($id, intval($this->argument('status')));
        }
        echo("The End.\n");
    }
}