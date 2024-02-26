<?php

namespace App\Services\Admin\Discount;

use App\Data\Repositories\Eloquent\DiscountRepository;

class UpdateService
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
     * Update discount
     *
     * @return string
     */
    public function handle (int $id, array $data)
    {
        $discount = $this->repository->update($data, $id);

        $item = view('admin.discount.updated-item', ['discount' => $discount])->render();

        return $item;
    }
}
