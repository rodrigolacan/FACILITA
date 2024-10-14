<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class cell implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^\(?\d{2}\)? ?(?:9\d{4}|\d{4})[-. ]?\d{4}$/', $value)) {
            $fail("O $attribute:$value não é um número de celular válido.");
        }
    }
}
