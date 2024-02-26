<?php

namespace App\Data\Repositories\Eloquent;

use App\Data\Validators\DiscountValidator;
use App\Models\Discount;

class DiscountRepository extends AppBaseRepository
{
    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'title' => ['column' => 'discounts.title', 'operator' => 'like', 'type' => 'normal'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Discount::class;
    }
}
