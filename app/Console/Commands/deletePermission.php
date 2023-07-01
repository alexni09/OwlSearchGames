<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Permission;

class deletePermission extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:deletePermission {permission}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes a permission from the permissions table. Cascades.';

    /**
     * Execute the console command.
     */
    public function handle() {
        $permission = $this->argument('permission');
        if (!Permission::existsPermission($permission)) echo("error: permission '".$permission."' does not exist.\nNothing to delete.\nFailed.\n");
        else {
            Permission::where('name', $permission)->delete();
            echo("success: permission '".$permission."' deleted.\n");
        }
    }
}