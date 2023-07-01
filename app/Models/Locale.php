<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locale extends Model {
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['locale','name','active'];
    public function categories() { return $this->hasMany(Category::class); }
    public function pronouns() { return $this->hasMany(Pronoun::class); }
    public function users() { return $this->hasMany(User::class); }

    /* Prepared queries */
    public static function getLocaleFromLocale($id) { return self::select(['locale'])->where('id',$id)->get()[0]->locale; }
    public static function getIdFromLocale($locale) { return self::select(['id'])->where('locale',$locale)->get()[0]->id; }
    public static function selectIdLocale() { return self::select(['id','locale'])->get(); }
    public static function selectIdLocaleName() { return self::select(['id','locale','name'])->orderBy('name')->get(); }
    public static function selectIdLocaleNameIfActive() { return self::select(['id','locale','name'])->where('active',true)->orderBy('name')->get(); }
    public static function getLocaleFromUserId($user_id) {
        $locale_id = User::getLocaleIdFromUserId($user_id); 
        return self::select(['locale'])->where('id', $locale_id)->get()[0]->locale; 
    }
}
