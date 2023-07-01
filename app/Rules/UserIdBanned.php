<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\UserClasses\BaseLanguage;
use App\Models\BannedUserId;

class UserIdBanned implements ValidationRule {
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void {
        $v = filter_var($value, FILTER_SANITIZE_ENCODED, FILTER_SANITIZE_SPECIAL_CHARS);
        if (BannedUserId::isBanned($v)) $fail(BaseLanguage::getOneMessage('genericError'));
    }
}