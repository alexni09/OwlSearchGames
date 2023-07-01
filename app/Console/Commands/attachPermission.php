<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Role;
use App\Models\Permission;

class attachPermission extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:attachPermission {role} {permission}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Attaches a {permission} to the {role}.';

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
                if (Role::RoleHasPermission($role,$permission)) echo("Error: role '".$role."' already has the permission '".$permission."'.\nNothing to attach.\nFailed.\n");
                else {
                    $role_obj = Role::getRoleFromName($role);
                    $role_obj->permissions()->attach(Permission::where('name',$permission)->value('id'));
                    echo("Success: permission '".$permission."' has been attached to the role '".$role."'.\n");
                }
            }
        }
    }
}