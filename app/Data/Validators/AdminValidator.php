<?php

namespace App\Data\Validators;

use App\Data\Validators\Traits\ExtendValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;

class AdminValidator extends LaravelValidator
{
    use ExtendValidator;

    /**
     * Rules for validation
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|max:50',
            'email' => 'required|email|max:50|unique:admins',
            'password' => 'required|min:6|max:50',
            'password_confirmation' => 'required|same:password',
            'avatar' => 'nullable|image',
            'role' => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
        ]
    ];
}
