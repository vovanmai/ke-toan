<?php

namespace App\Services\Admin\Discount;

use App\Data\Repositories\Eloquent\DiscountRepository;

class StoreService
{
    /**
     * @var DiscountRepository
     */
    protected $repository;

    public function __construct(
        DiscountRepository $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * Create product
     *
     * @return string
     */
    public function handle (array $data)
    {
        $discount = $this->repository->create($data);

        $item = view('admin.discount.item', ['discount' => $discount])->render();

        return $item;
    }
}
