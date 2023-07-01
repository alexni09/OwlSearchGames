<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

/* Language Support */
use App\UserClasses\BaseLanguage;

class UserIdFirstCharacter implements ValidationRule {
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void {
        if (!preg_match('/^[a-z]/', $value)) $fail(BaseLanguage::getOneMessage('userIdFirstCharacterRule'));
    }
}