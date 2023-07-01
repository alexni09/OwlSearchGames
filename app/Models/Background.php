<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Background extends Model {
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['img','background_position','permission_id'];

    /* Dynamic Background Style */
    public const IMAGE_DIR = '/images/background/';

    /* Relationships */
    public function permissions() { return $this->belongsTo(Permission::class); }

    /* Prepared Queries */
    public static function fetchRandom() {
        $id = Auth::id();
        if (!isset($id)) return self::whereNull('permission_id')->inRandomOrder()->first();
        else {
            $first = DB::table('permission_role')
                     ->join('backgrounds','backgrounds.permission_id','=','permission_role.permission_id')
                     ->join('role_user','permission_role.role_id','=','role_user.role_id')
                     ->select(['backgrounds.*'])
                     ->where('role_user.user_id','=',$id)
                     ->whereNotNull('backgrounds.permission_id');
            $result = self::whereNull('permission_id')->union($first);
            return $result->inRandomOrder()->first();
        }
    }
}