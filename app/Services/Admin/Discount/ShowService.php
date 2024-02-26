<?php

namespace App\Services\Admin\Discount;

use App\Data\Repositories\Eloquent\DiscountRepository;

class ShowService
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
     * Show discount
     *
     * @return string
     */
    public function handle (int $id)
    {
        return $this->repository->find($id);
    }
}
