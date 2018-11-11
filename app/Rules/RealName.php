<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RealName implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $names = explode(' ', $value);

        $filters = array_filter($names, function($var) {
            if ($var[0] === mb_strtoupper($var[0])) {
                return $var;
            }
            return false;
        });

        return count($names) == 2 && count($filters) == 2;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must contain two words and both with a capital letter.';
    }
}
