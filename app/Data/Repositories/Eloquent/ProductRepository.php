<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\Product;

class ProductRepository extends AppBaseRepository
{
    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'name' => ['column' => 'products.name', 'operator' => 'like', 'type' => 'normal'],
        'price' => ['column' => 'products.price', 'operator' => '=', 'type' => 'normal'],
        'category_id' => ['column' => 'products.category_id', 'operator' => '=', 'type' => 'normal'],
        'created_at_from' => ['column' => 'products.created_at', 'operator' => '>=', 'type' => 'date'],
        'created_at_to' => ['column' => 'products.created_at', 'operator' => '<=', 'type' => 'date'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Product::class;
    }
}
