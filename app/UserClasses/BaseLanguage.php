<?php 
namespace App\UserClasses;

use Illuminate\Support\Facades\App;

class BaseLanguage {
    /**
     * [console]
     * Kindly replace $lang with an array of key/value pairs, on the child class.
     */
    protected static $lang = null;

    /**
     * [console & web]
     * All languages currently supported.
     */
    protected static $allLanguages = ['en','pt'];

    /**
     * [web]
     * Default language.
     */
    protected static $defaultLanguage = 'en';

    /**
     * [console & web]
     * Returns the array with the key/value message pairs of the child class.
     */
    public static function get() { return static::class::$lang; }

    /**
     * [console & web]
     * Returns the array containing all the currently supported languages. (From this class.)
     */
    public static function getAllLanguages() { return static::$allLanguages; }

    /**
     * [web]
     * Returns the default language.
     */
    public static function getDefaultLanguage() { return static::$defaultLanguage; } 

    /**
     * [console]
     * Returns JSON encoded language key/value string. (From the child class.)
     */
    public static function getJson($l = "") {
        switch ($l) {
            case '': return json_encode(static::class::$lang); break;
            case 'en': return LanguageEn::getJson(); break;
            case 'pt': return LanguagePt::getJson(); break;
            default: return null;
        }
    }

    /**
     * [web]
     * Returns the message string. (From the child class.)
     */
    public static function getOneMessage($key = "", $locale = null) {
        if (!isset($locale)) $myLocale = App::getLocale();
        else $myLocale = $locale;
        switch ($myLocale) {
            case 'en': return LanguageEn::get()[$key]; break;
            case 'pt': return LanguagePt::get()[$key]; break;
            default: return null;
        }
    }

    /**
     * [web]
     * Tests if the language is a valid one. (From this class.)
     */
    public static function isValidLocale($l = "") {
        return in_array($l, static::getAllLanguages());
    }
}