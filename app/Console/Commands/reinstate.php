<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\UserUpdate;
use App\Models\DeletedRoleUser;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\BannedEmail;
use App\Models\BannedUserId;

class reinstate extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reinstate {user_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reinstates a deleted user, if possible.';

    /**
     * Execute the console command.
     */
    public function handle() {
        $user_id = $this->argument('user_id');
        if (!UserUpdate::existsDeletedUserId($user_id)) echo("Error: user_id '".$user_id."' is not deleted.\nFailed.\n");
        else if (BannedUserId::isBanned($user_id)) echo("Error: user_id '".$user_id."' is currently in a ban list.\nFailed.\n");
        else {
            $email = UserUpdate::getEmailFromDeletedUserId($user_id);
            if (User::emailExists($email)) echo("Error: email '".$email."' already exists in users table.\nFailed.\n");
            else if (BannedEmail::isBanned($email)) echo("Error: email '".$email."' is currently in a ban list.\nFailed.\n");
            else {
                if (User::userIdExists($user_id)) echo("Error: user_id '".$user_id."' already exists in users table.\nFailed.\n");
                else {
                    UserUpdate::undelete($user_id);
                    $userUpdate = UserUpdate::where(User::MAIN_FIELD,$user_id)->where('operation','E')->get()[0];
                    $password = Str::random(9);
                    $user = User::create([
                        User::MAIN_FIELD => $user_id,
                        User::STATUS_FIELD => User::STATUS_FIELD_PASSWORD_EXPIRED,
                        User::PASSWORD_FIELD => Hash::make($password),
                        'name' => $userUpdate->name,
                        'email' => $email,
                        'email_verified_at' => Carbon::now(),
                        'locale_id' => $userUpdate->locale_id,
                        'pronoun_id' => $userUpdate->pronoun_id,
                        'show_pronoun' => $userUpdate->show_pronoun,
                        'show_name' => $userUpdate->show_name,
                        'show_email' => $userUpdate->show_email,
                        'show_user_id' => $userUpdate->show_user_id
                    ]);
                    User::undeleteRoles($user_id);
                    DeletedRoleUser::deleteAllRolesByUserId($user_id);
                    $userUpdate->operation = 'R';
                    $userUpdate->save();
                    echo("Success: '".$user_id." reinstated.\n");
                    echo("Password is : '".$password."'\n");
                }
            }
        }
    }
}