<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Role;

class deleteRole extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:deleteRole {role}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes a role from the roles table. Cascades.';

    /**
     * Execute the console command.
     */
    public function handle() {
        $role = $this->argument('role');
        if (!Role::roleExists($role)) echo("error: role '".$role."' does not exist.\nNothing to delete.\nFailed.\n");
        else {
            Role::where('name', $role)->delete();
            echo("success: role '".$role."' deleted.\n");
        }
    }
}