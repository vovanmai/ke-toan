<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckHtmlElement implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $regex = "/<[a-z]+ ?.*>(.*)<\/[a-z]+>/";

        if ($value && !preg_match($regex, $value)) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute không đúng định dạng.';
    }
}
