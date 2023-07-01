<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class UserUpdate extends Model {
    use HasFactory;
    
    protected $fillable = ['old_id', User::MAIN_FIELD, User::STATUS_FIELD, User::PASSWORD_FIELD, 
        'name', 'email', 'email_verified_at', 'locale_id', 'pronoun_id', 'show_pronoun', 'show_name', 'show_user_id', 'show_email',
        'created_at', 'operation'];
    public $timestamps = ["created_at"];
    const UPDATED_AT = null;
    
    /* Prepared Queries */
    public static function addDeleted($id) {
        self::insertUsing([
            'old_id', User::MAIN_FIELD, User::STATUS_FIELD, User::PASSWORD_FIELD, 
            'name', 'email', 'email_verified_at', 'locale_id', 'pronoun_id', 'show_pronoun', 'show_name', 'show_user_id', 'show_email',
            'created_at', 'operation'
        ], DB::table('users')->select(
            'id', User::MAIN_FIELD, User::STATUS_FIELD, User::PASSWORD_FIELD, 
            'name', 'email', 'email_verified_at', 'locale_id', 'pronoun_id', 'show_pronoun', 'show_name', 'show_user_id', 'show_email',
        )->addSelect(DB::raw("NOW() as created_at, 'D' as operation"))->where('id', $id));
    }

    public static function addUpdated($id) {
        self::insertUsing([
            'old_id', User::MAIN_FIELD, User::STATUS_FIELD, User::PASSWORD_FIELD, 
            'name', 'email', 'email_verified_at', 'locale_id', 'pronoun_id', 'show_pronoun', 'show_name', 'show_user_id', 'show_email',
            'created_at', 'operation'
        ], DB::table('users')->select(
            'id', User::MAIN_FIELD, User::STATUS_FIELD, User::PASSWORD_FIELD, 
            'name', 'email', 'email_verified_at', 'locale_id', 'pronoun_id', 'show_pronoun', 'show_name', 'show_user_id', 'show_email',
        )->addSelect(DB::raw("NOW() as created_at, 'U' as operation"))->where('id', $id));
    }

    public static function getEmailFromDeletedUserId($user_id) {
        return self::select('email')->where(User::MAIN_FIELD,$user_id)->where('operation','D')->get()[0]->email;
    }

    public static function existsDeletedUserId($user_id) {
        return (bool) self::selectRaw('count(*) as boo')->where(User::MAIN_FIELD,$user_id)->where('operation','D')->get()[0]->boo;
    }

    public static function undelete($user_id) {
        self::where(User::MAIN_FIELD,$user_id)->where('operation','D')->update(['operation' => 'E']);
    }
}