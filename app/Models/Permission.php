<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Permission extends Model {
    use HasFactory;
    protected $fillable = ['name'];
    public $timestamps = ["created_at"];
    const UPDATED_AT = null;

    /* Relationships */
    public function backgrounds() { return $this->hasMany(Background::class); }
    public function categories() { return $this->hasMany(Category::class); }
    public function roles() { return $this->belongsToMany(Role::class); }  /* "inverse" relationship */

    /* Prepared Queries */
    public static function existsPermission($name) { return (bool) self::selectRaw("count(*) as hasPermission")->where('name',$name)->get()[0]->hasPermission; }
    public static function getIdFromName($permission) { 
        $r = self::select('id')->where('name', $permission)->get();
        return $r->isEmpty() ? null : $r[0]->id; 
    }
    public static function userHasPermission($id, $permissionName) {
        $permission_id = self::getIdFromName($permissionName);
        if (isset($permission_id)) {
            $roles_id_s = array_values(DB::Table('permission_role')->select('role_id')->where('permission_id',$permission_id)->get()->pluck('role_id')->toArray());
            $user_id_s = array_values(DB::Table('role_user')->whereIn('role_id',$roles_id_s)->get()->pluck('user_id')->toArray());
            return in_array($id,$user_id_s);
        } else return false;
    }
    public static function permissionsFromUser($id) {
        return DB::table('permission_role')
        ->join('permissions','permissions.id','=','permission_role.permission_id')
        ->join('role_user','role_user.role_id','=','permission_role.role_id')
        ->where('role_user.user_id',$id)->pluck('name');
    }
}