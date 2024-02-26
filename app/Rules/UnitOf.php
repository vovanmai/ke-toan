<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UnitOf implements Rule
{
    public $number;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(int $number = 1000)
    {
        $this->number = $number;
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
        if (is_null($value) || $value % $this->number === 0) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Cần đơn vị của $this->number.";
    }
}
