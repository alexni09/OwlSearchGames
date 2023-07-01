<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Role;

class detachRole extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:detachRole {user_id} {role}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Detaches {role} from the user specified by {user_id}.';

    /**
     * Execute the console command.
     */
    public function handle() {
        $user_id = $this->argument('user_id');
        if (!User::userIdExists($user_id)) echo("Error: user_id '".$user_id."' doesn't exist in users table.\nFailed.\n");
        else {
            $role = $this->argument('role');
            if (!Role::roleExists($role)) echo("Error: role '".$role."' doesn't exist in roles table.\nFailed.\n");
            else {
                if (!User::userIdHasRole($user_id,$role)) echo("Error: user_id '".$user_id."' hasn't the role '".$role."'.\nNothing to remove.\nFailed.\n");
                else {
                    $user = User::getUserFromUserId($user_id);
                    $user->roles()->detach(Role::where('name',$role)->value('id'));
                    echo("Success: role '".$role."' has been detached from user '".$user_id."'.\n");
                }
            }
        }
    }
}