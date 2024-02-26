<?php

namespace App\Services\Admin\Order;

use App\Data\Repositories\Eloquent\OrderRepository;
use App\Data\Repositories\Eloquent\ProductRepository;
use App\Models\OrderHistory;

class DetailService
{
    /**
     * @var OrderRepository
     */
    protected $repository;

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    public function __construct(
        OrderRepository $repository,
        ProductRepository $productRepository
    ) {
        $this->repository = $repository;
        $this->productRepository = $productRepository;
    }

    /**
     * @param $id $id Id
     *
     * @return array
     */
    public function handle (int $id)
    {
        $order = $this->repository->with([
            'orderHistories.updatable'
        ])->find($id);

        $orderDetails = $this->productRepository->with([
            'previewImage',
        ])
            ->join(
            'order_details',
            'order_details.product_id',
            '=',
            'products.id'
        )->findWhere(['order_details.order_id' => $id], [
            'products.id',
            'products.name',
            'order_details.price',
            'order_details.quantity',
            'order_details.discount',
        ]);

        return [$order, $orderDetails];
    }
}
