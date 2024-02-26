<?php

namespace App\Data\Validators\Traits;

use App\Data\Validators\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;

trait ExtendValidator
{

    /**
     * Extend Validator
     *
     * @param array $data      Data
     * @param array $rules     Rule
     * @param array $messages  Message
     * @param array $attribute Attribute
     *
     * @return void
     *
     * @throws ValidatorException
     */
    public function validateData($data, $rules, $messages = [], $attribute = [])
    {
        $validator = $this->validator->make($data, $rules, $messages, $attribute);
        if ($validator->fails()) {
            throw new ValidatorException($validator->messages(), ValidatorInterface::RULE_CREATE);
        }
    }
}
