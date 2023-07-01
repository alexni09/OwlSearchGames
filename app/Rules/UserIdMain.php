<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

/* Language Support */
use App\UserClasses\BaseLanguage;

class UserIdMain implements ValidationRule {
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void {
        if (!preg_match('/^[a-z|0-9|\.|\_]+$/', $value)) $fail(BaseLanguage::getOneMessage('userIdMainRule'));
    }
}