<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Role;

class createRole extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:createRole {role}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new role, if it not exists.';

    /**
     * Execute the console command.
     */
    public function handle() {
        $role = $this->argument('role');
        if (Role::roleExists($role)) echo("error: role '".$role."' already exists.\nFailed.\n");
        else {
            Role::create(['name' => $role]);
            echo("success: role '".$role."' created.\n");
        }
    }
}