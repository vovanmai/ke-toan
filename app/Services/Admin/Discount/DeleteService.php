<?php

namespace App\Services\Admin\Discount;

use App\Data\Repositories\Eloquent\DiscountRepository;

class DeleteService
{
    /**
     * @var DiscountRepository
     */
    protected $repository;

    public function __construct(DiscountRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id Id
     *
     * @return void
     */
    public function handle (int $id)
    {
        $this->repository->delete($id);
    }
}
