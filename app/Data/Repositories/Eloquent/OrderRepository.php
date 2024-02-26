<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\Order;

class OrderRepository extends AppBaseRepository
{
    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'code' => ['column' => 'orders.code', 'operator' => 'like', 'type' => 'normal'],
        'payment_method' => ['column' => 'orders.payment_method', 'operator' => '=', 'type' => 'normal'],
        'name' => ['column' => 'orders.name', 'operator' => 'like', 'type' => 'normal'],
        'email' => ['column' => 'orders.email', 'operator' => 'like', 'type' => 'normal'],
        'phone_number' => ['column' => 'orders.phone_number', 'operator' => 'like', 'type' => 'normal'],
        'status' => ['column' => 'orders.status', 'operator' => 'in', 'type' => 'normal'],
        'created_at_from' => ['column' => 'orders.created_at', 'operator' => '>=', 'type' => 'date'],
        'created_at_to' => ['column' => 'orders.created_at', 'operator' => '<=', 'type' => 'date'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Order::class;
    }
}
