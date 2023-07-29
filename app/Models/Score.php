<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Query\Builder;

class Score extends Model {
    use HasFactory;
    protected $fillable = [User::MAIN_FIELD, 'difficulty', 'difficultyLevel', 'score'];

    public const POINTS_ADVANCED = 2000;
    public const POINTS_PREMIUM = 10000;
    protected const DIFFICULTY_FOR_TESTING = -1000;

    /* Misc */
    public static function getEffectiveScore(int $difficulty):int {
        return max(30, intval(ceil(0.015*max(50, 100 + $difficulty)**1.9002)));
    }

    /* Prepared Queries */
    public static function cleanse($userIds = []): void {   /* users.user_id's */   /* this function is used when testing */
        self::where('difficulty', '<=', static::DIFFICULTY_FOR_TESTING)->whereIn(USER::MAIN_FIELD, $userIds)->delete();
    }

    public static function existsUserId($user_id) {
        return boolVal(self::selectRaw('count(*) as thisCount')->where('user_id', $user_id)->get()[0]->thisCount);
    }

    public static function fetchLastRecordByUserId($user_id) {    /* this function is used when testing */
        if (static::existsUserId($user_id))
            return self::where('id', function (Builder $query) use ($user_id) {
                $query->selectRaw('max(b.id)')->from('scores as b')->where('b.user_id', $user_id);
            })->get()[0];
        else return null;
    }

    public static function getCountForAfterCleansing($userIds = []) {   /* users.user_id's */   /* this function is used when testing */
        return self::selectRaw("count(*) as thisCount")->where('difficulty', '<=', static::DIFFICULTY_FOR_TESTING)->whereIn(USER::MAIN_FIELD, $userIds)->get()[0]->thisCount;
    }

    public static function getTotalScore($user_id) {
        $r = self::selectRaw("sum(score) as totalScore")->whereNotNull('score')->where(User::MAIN_FIELD, $user_id)->get()[0]->totalScore;
        return $r ?? 0;
    }

    public static function getMaxId() {
        return self::selectRaw("max(id) as maxId")->get()[0]->maxId ?? 0;
    }
}