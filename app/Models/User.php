<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Facades\DB;
use App\Models\Permission;

class User extends Authenticatable implements MustVerifyEmail {
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id', 
        'status', 
        'password', 
        'name', 
        'email',
        'email_verified_at',
        'locale_id', 
        'pronoun_id', 
        'show_pronoun', 
        'show_name', 
        'show_user_id', 
        'show_email'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = ['email_verified_at' => 'datetime'];

    /* Some important fields */
    public const MAIN_FIELD = 'user_id';
    public const MAIN_FIELD_MIN_CHARS = 5;
    public const MAIN_FIELD_MAX_CHARS = 20;
    public const PASSWORD_FIELD = 'password';
    public const PASSWORD_FIELD_MIN_CHARS = 8;
    public const STATUS_FIELD = 'status';
    public const STATUS_FIELD_ACTIVE = 1;
    public const STATUS_FIELD_LOGOUT_NEXT = 2;
    public const STATUS_FIELD_LOGOUT = 3;
    public const STATUS_FIELD_PASSWORD_EXPIRED = 4;
    public const NAME_FIELD_MAX_CHARS = 100;
    public const EMAIL_FIELD_MAX_CHARS = 60;

    /* Relationships */
    public function categories() { return $this->HasMany(Category::class); }
    public function locale() { return $this->belongsTo(Locale::class); }
    public function pronoun() { return $this->belongsTo(Pronoun::class); }
    public function roles() { return $this->belongsToMany(Role::class); }
    public function words() { return $this->HasMany(Word::class); }

    /* Prepared queries */
    public static function emailExists($email) { return (bool) self::selectRaw('count(*) as emailExists')->where('email',$email)->get()[0]->emailExists; }
    public static function getIdFromUserId($user_id) { return self::select(['id'])->where('user_id',$user_id)->get()[0]->id; }
    public static function getLocaleIdFromUserId($user_id) { return self::select(['locale_id'])->where('user_id',$user_id)->get()[0]->locale_id; }
    public static function getMaxId() { return self::selectRaw('max(id) as maxid')->get()[0]->maxid; }
    public static function getStatusFromUserId($user_id) { return self::select([self::STATUS_FIELD])->where('user_id',$user_id)->get()[0]->status; }
    public static function getUserFromEmail($email) { return self::where('email',$email)->get()[0]; }
    public static function getUserFromUserId($user_id) { return self::where(self::MAIN_FIELD,$user_id)->get()[0]; }
    public static function idExists($id) { return (bool) self::selectRaw('count(*) as idExists')->where('id',$id)->get()[0]->idExists; }
    public static function undeleteRoles($user_id) {
        $id = self::getIdFromUserId($user_id);
        DB::table('role_user')->insertUsing([
            'user_id', 'role_id'
        ], DB::table('deleted_role_users')->selectRaw(strval($id)." as id")
            ->addSelect('role_id')->where('user_id', $user_id));
    }
    public static function updateStatus($id, $status) { DB::table('users')->where('id', $id)->update(['status' => $status]); }
    public static function userIdExists($user_id) { return (bool) self::selectRaw('count(*) as userIdExists')->where(static::MAIN_FIELD,$user_id)->get()[0]->userIdExists; }
    public static function userIdHasRole($user_id, $name) {
        return (bool) DB::table('role_user')->join('users','users.id','=','role_user.user_id')->join('roles','roles.id','=','role_user.role_id')
            ->selectRaw("count(*) as howMany")->where('users.'.static::MAIN_FIELD,$user_id)->where('roles.name',$name)->get()[0]->howMany;
    }

    /* Misc functions */
    public static function isActive($user_id) {
        $status = self::getStatusFromUserId($user_id); 
        return $status === self::STATUS_FIELD_ACTIVE || $status === self::STATUS_FIELD_PASSWORD_EXPIRED;
    }
    public function hasEverBeenUpdated() { return $this->created_at->ne($this->updated_at); } /* not equal: from Carbon */
    public function hasPermission($permissionName) { return Permission::userHasPermission($this->id,$permissionName); }
}