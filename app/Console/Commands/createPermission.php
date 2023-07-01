<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Permission;

class createPermission extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:createPermission {permission}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new permission, if it not exists.';

    /**
     * Execute the console command.
     */
    public function handle() {
        $permission = $this->argument('permission');
        if (Permission::existsPermission($permission)) echo("error: permission '".$permission."' already exists.\nFailed.\n");
        else {
            Permission::create(['name' => $permission]);
            echo("success: permission '".$permission."' created.\n");
        }
    }
}