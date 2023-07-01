<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PasswordToken extends Model {
    use HasFactory;

    protected $fillable = [User::MAIN_FIELD,'token','is_used'];
    public $timestamps = ["created_at"];
    const UPDATED_AT = null;

    /* Misc */
    public const PASSWORD_LENGTH = 9;
    public const TOKEN_LENGTH = 20;
    public const MINUTES = 60; /* Minutes whilst the token will be valid, if not used yet */

    /* Prepared Queries */
    public static function existsToken($token) {
        return (bool) self::selectRaw('count(*) as tokenExists')->where('token',$token)->where('is_used',0)->get()[0]->tokenExists;
    }
    public static function getUserIdByToken($token) {
        return self::select('user_id')->where('token',$token)->get()[0]->user_id;
    }
    public static function setUsed($user_id) { self::where(User::MAIN_FIELD, $user_id)->update(['is_used' => true]); }
}