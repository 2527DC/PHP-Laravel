<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Uppercase implements Rule
{
    public function passes($attribute, $value)
    {
        return strtoupper($value) === $value; // Check if the value is uppercase
    }

    public function message()
    {
        return 'The :attribute must be uppercase.';
    }
}
