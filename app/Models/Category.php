<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model {
    protected $fillable = ['category','locale_id','user_id','permission_id'];

    /* Relationships */
    public function locale() { return $this->belongsTo(Locale::class); }
    public function permission() { return $this->belongsTo(Permission::class); }
    public function user() { return $this->belongsTo(User::class); }
    public function words() { return $this->hasMany(Word::class); }

    /* Prepared Queries */
    public static function getCategoryById($id) { return self::select(['category'])->where('id',$id)->get()[0]->category; }
    public static function getIdByCategory($category) { return self::select(['id'])->where('category',$category)->get()[0]->id; }
    public static function getRandomCategoryIdByLocaleId($locale_id) { return DB::table('categories')->where('locale_id',$locale_id)->inRandomOrder()->first()->id; }
}