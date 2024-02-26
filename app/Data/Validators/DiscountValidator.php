<?php

namespace App\Data\Validators;


use App\Data\Validators\Traits\ExtendValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class DiscountValidator extends LaravelValidator
{
    use ExtendValidator;
    /**
     * Rules for validation
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'title' => 'required|max:255|unique:discounts',
            'discount_percent' => 'required|integer|min:1|max:50',
            'description' => 'nullable',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'title' => 'required|max:255|unique:discounts',
            'discount_percent' => 'required|integer|min:1|max:50',
            'description' => 'nullable',
        ]
    ];
}
