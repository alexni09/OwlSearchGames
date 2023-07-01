<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DeletedRoleUser extends Model {
    use HasFactory;

    public $timestamps = ["created_at"];
    const UPDATED_AT = null;

    /* Prepared Queries */
    public static function deleteAllRolesByUserId($user_id) { self::where(User::MAIN_FIELD,$user_id)->delete(); }
    public static function insertAllRolesByUserId($user_id) {
        self::insertUsing([User::MAIN_FIELD,'role_id','created_at'],
            DB::table('users')->join('role_user','users.id', '=', 'role_user.user_id')
            ->select('users.'.User::MAIN_FIELD,'role_user.role_id')
            ->addSelect(DB::Raw("NOW() as created_at"))
            ->where('users.'.User::MAIN_FIELD,$user_id)
        );
    }
}