<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidImage implements Rule
{
    public function passes($attribute, $value)
    {
        $allowedExtensions = ['jpeg', 'jpg', 'png', 'gif', 'svg'];

        // Get the file extension
        $extension = pathinfo($value->getClientOriginalName(), PATHINFO_EXTENSION);

        // Check if the extension is not in the allowed list and not equal to 'tmp'
        return !in_array(strtolower($extension), $allowedExtensions) && strtolower($extension) !== 'tmp';
    }

    public function message()
    {
        return 'The :attribute field format is invalid.';
    }
}
