<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BannedUserId extends Model {
    protected $fillable = ['part','operation'];
    public $timestamps = ["created_at"];
    const UPDATED_AT = null;

    /* Prepared Queries */
    public static function deleteByPartAndByOperation($part, $operation) {
        DB::table('banned_user_ids')->where('part', $part)->where('operation', $operation)->delete();
    } 

    public static function exists($part, $operation) {
        return self::where('part', $part)->where('operation', $operation)->get()->isNotEmpty();
    }

    public static function isBanned($user_id) {
        $first = DB::table('banned_user_ids')->selectRaw("1 as match_position")->where('operation',1)->where('part',$user_id);
        $second = DB::table('banned_user_ids')->selectRaw("locate(part,?) as match_position",[$user_id])->where('operation',2)->union($first);
        return $second->get()->where('match_position','!=',0)->isNotEmpty();
    }
}