<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pronoun extends Model {
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['pronoun','sex','locale_id'];
    public function users() { return $this->hasMany(User::class); }
    public function locale() { return $this->belongsTo(Locale::class); }

    /* Prepared queries */
    public static function getIdFromLocalePronoun($locale_id,$pronoun) { return self::select(['id'])->where('locale_id',$locale_id)->where('pronoun',$pronoun)->get()[0]->id; }
    public static function getSexFromLocalePronoun($locale_id,$pronoun) { return self::select(['sex'])->where('locale_id',$locale_id)->where('pronoun',$pronoun)->get()[0]->sex; }
    public static function getSexFromPronoun($pronoun_id) { return self::select(['sex'])->where('id',$pronoun_id)->get()[0]->sex; }
    public static function getPronounFromPronoun($pronoun_id) { return self::select(['pronoun'])->where('id',$pronoun_id)->get()[0]->pronoun; }
    public static function selectIdLocalePronoun() { return self::select(['id','locale_id','pronoun'])->orderBy('locale_id','asc')->orderBy('pronoun','asc')->get(); }
}