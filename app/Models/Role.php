<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model {
    protected $fillable = ['name'];
    public $timestamps = ["created_at"];
    const UPDATED_AT = null;

    /* Relationships */
    public function permissions() { return $this->belongsToMany(Permission::class); }
    public function users() { return $this->belongsToMany(User::class); }  /* "inverse" relationship */

    /* Prepared queries */
    public static function getIdByName($name) { return self::select('id')->where('name',$name)->get()[0]->id; }
    public static function getRoleFromName($name) { return self::where('name',$name)->get()[0]; }
    public static function roleExists($name) { return (bool) self::selectRaw('count(*) as roleExists')->where('name',$name)->get()[0]->roleExists; }
    public static function RoleHasPermission($role, $permissionName) {
        return (bool) DB::table('permission_role')
            ->join('roles','roles.id','=','permission_role.role_id')->join('permissions','permissions.id','=','permission_role.permission_id')
            ->selectRaw("count(*) as howMany")->where('roles.name',$role)->where('permissions.name',$permissionName)->get()[0]->howMany;
    }
}