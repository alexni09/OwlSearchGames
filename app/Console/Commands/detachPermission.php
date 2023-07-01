<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Role;
use App\Models\Permission;

class detachPermission extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:detachPermission {role} {permission}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Detaches a {permission} from {role}.';

    /**
     * Execute the console command.
     */
    public function handle() {
        $role = $this->argument('role');
        if (!Role::roleExists($role)) echo("Error: role '".$role."' doesn't exist in roles table.\nFailed.\n");
        else {
            $permission = $this->argument('permission');
            if (!Permission::existsPermission($permission)) echo("Error: permission '".$permission."' doesn't exist in permissions table.\nFailed.\n");
            else {
                if (!Role::RoleHasPermission($role,$permission)) echo("Error: role '".$role."' doesn't have the permission '".$permission."'.\nNothing to detach.\nFailed.\n");
                else {
                    $role_obj = Role::getRoleFromName($role);
                    $role_obj->permissions()->detach(Permission::where('name',$permission)->value('id'));
                    echo("Success: permission '".$permission."' has been detached from the role '".$role."'.\n");
                }
            }
        }
    }
}