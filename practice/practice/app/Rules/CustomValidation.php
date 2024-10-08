<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CustomValidation implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Check if the value is uppercase
        if (strtoupper($value) !== $value) {
            $fail("The {$attribute} must be uppercase.");
        }

        // Check if the value contains spaces
        if (strpos($value, ' ') !== false) {
            $fail("The {$attribute} must not contain spaces.");
        }
    }
}
