<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

/* Language Support */
use App\UserClasses\BaseLanguage;

class UserIdLastCharacter implements ValidationRule {
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void {
        if (!preg_match('/[a-z|0-9]$/', $value)) $fail(BaseLanguage::getOneMessage('userIdLastCharacterRule'));
    }
}