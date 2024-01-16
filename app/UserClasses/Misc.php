<?php

namespace App\UserClasses;

use Carbon\Carbon; 

class Misc {
    /* Very simple field validation */
    public const ORDERING = ['asc','desc'];

    /* Operation, for the Light Bulb Component */
    const MIN_IDEA_OPERATION = 1;
    const MAX_IDEA_OPERATION = 8;   /*  Login/Register; gained Advanced; gained Premium (before promo date); gained Premium (after promo date); became Donor; 
                                        level up to Advanced!; level up to Premium! (before promo date); level up to Premium! (after promo date); */

    /* Return the promo date */
    public const END_PROMO_DATE_EN = 'January 31st, 2025';
    public const END_PROMO_DATE_PT = '31/01/2025';
    protected static function END_PROMO_DATE() { return Carbon::createFromFormat('d/m/Y H:i:s', '31/01/2025 23:59:59'); }

    /* Returns true iff now() is earlier than or equal to the promo date */
    public static function meetsPromoPremiumCriteria():bool { return Carbon::now()->lte(self::END_PROMO_DATE()); }

    /* Returns false iff $st doesn't contain nor it is contained by any string inside the array. */
    public static function strposReduce(array $arr, string $st): bool {
        return boolval(array_reduce($arr, function($carry, $value) use ($st) {
            if ($st === $value) $carry += 1;
            elseif (strpos($value, $st)) $carry += 1; 
            elseif (strpos($st, $value)) $carry += 1;
            return $carry;
        }));
    }

    /* Returns false iff all strings, separated by a space, and contained in $st, pass the check above. */
    public static function strposReduceAllWords(array $arr, string $st): bool {
        $arrayExploded = explode(" ", $st);
        foreach ($arrayExploded as $v)
            if (self::strposReduce($arr, $v)) return true;
        return false;
    }
}