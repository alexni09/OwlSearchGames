<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BannedEmail extends Model {
    protected $fillable = ['part','operation'];
    public $timestamps = ["created_at"];
    const UPDATED_AT = null;

    /* Prepared Queries */
    public static function deleteByPartAndByOperation($part, $operation) {
        DB::table('banned_emails')->where('part', $part)->where('operation', $operation)->delete();
    } 

    public static function exists($part, $operation) {
        return self::where('part', $part)->where('operation', $operation)->get()->isNotEmpty();
    }

    public static function isBanned($email) {
        $first = DB::table('banned_emails')->selectRaw("1 as match_position")->where('operation',1)->where('part',$email);
        $second = DB::table('banned_emails')->selectRaw("locate(part,?) as match_position",[$email])->where('operation',2)->union($first);
        return $second->get()->where('match_position','!=',0)->isNotEmpty();
    }
}