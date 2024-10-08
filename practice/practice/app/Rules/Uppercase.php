<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Uppercase implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Check if the value is not in uppercase
        if (strtoupper($value) !== $value) {
            // Trigger validation failure with a custom message
            $fail('The ' . $attribute . ' must be in uppercase.');
        }
    }

    
}
