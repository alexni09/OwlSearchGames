<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valve extends Model {
    use HasFactory;
    protected $fillable = ['this_key', 'this_value'];
    public $timestamps = false;
    public const MY_KEY = 'valve';

    /* Prepared Queries */
    public static function exists($key) { 
        return (bool) self::selectRaw("count(*) as qty")->where('this_key',$key)->get()[0]->qty;
    }

    public static function getValue($key) {
        if (self::exists($key))
            return self::selectRaw("convert(AES_DECRYPT(this_encrypted,'" . self::MY_KEY . "'), char(255)) as this_value")->where('this_key',$key)->get()[0]->this_value;
        else return null;
    }
}