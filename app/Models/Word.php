<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as BuilderDB;
use Illuminate\Database\Eloquent\Builder as BuilderEloquent;
use Illuminate\Support\Facades\DB;

class Word extends Model {
    use HasFactory;
    protected $fillable = ['word', 'category_id', 'difficult', 'user_id'];

    /* Misc */
    public const MIN_WORD_LENGTH = 4;

    /* Relations */
    public function category() { return $this->belongsTo(Category::class); }
    public function user() { return $this->belongsTo(User::class); }

    /* Prepared Queries */
    public static function fetchAllWordsByCategoryId($category_id) {
        return self::select('word')->where('category_id', $category_id)->get()->pluck('word')->toArray();
    }
    public static function fetchAllWordsByLocaleId($locale_id) {
        return DB::table('words')->join('categories','words.category_id','=','categories.id')
            ->select('words.word')->where('categories.locale_id',$locale_id)->get()->pluck('word')->toArray();
    }
    public static function fetchCategoriesWithSuchMinimumWordsAndLocale($locale_id, $minimum, $difficulty = null) {
        return DB::table('words')->join('categories','words.category_id','=','categories.id')
            ->select('words.category_id')->when($difficulty, function (BuilderDB $query, bool $difficulty) {
                $query->where('words.difficult', $difficulty);
            })->where('categories.locale_id',$locale_id)
            ->groupBy('words.category_id')->havingRaw("count(*) >= ".strval($minimum))->get()->pluck('category_id')->toArray();
    }    
    public static function fetchWordsByDifficultyAndCategoryId($category_id, $difficulty = null) {
        if ($difficulty === null) return self::fetchAllWordsByCategoryId($category_id);
        else return self::select('word')->where('difficult', $difficulty)->where('category_id', $category_id)->get()->pluck('word')->toArray();
    }
    public static function getRandomCategoryWithSuchMinimumWordsAndLocale($locale_id, $minimum, $difficulty = null) {
        $c = DB::table('words')->join('categories','words.category_id','=','categories.id')
            ->select('words.category_id')->when($difficulty, function (BuilderDB $query, bool $difficulty) {
                $query->where('words.difficult', $difficulty);
            })->where('categories.locale_id',$locale_id)
            ->groupBy('words.category_id')->havingRaw("count(*) >= ".strval($minimum))->get();
        return $c->isEmpty() ? null : $c->random()->category_id;
    }    
    public static function maxWordsFromCategoryByLocaleId($locale_id) {
        return DB::table('words')->join('categories','words.category_id','=','categories.id')
            ->selectRaw("count(*) as howMany")->where('categories.locale_id',$locale_id)
            ->groupBy('words.category_id')->get()->max('howMany');
    }
}