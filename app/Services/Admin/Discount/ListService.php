<?php

namespace App\Services\Admin\Discount;

use App\Data\Repositories\Eloquent\DiscountRepository;

class ListService
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
     * @param array $filters Filters
     *
     * @return
     */
    public function handle (array $filters)
    {
        return $this->repository->search($filters)
            ->orderByColumns([
                'id' => 'desc',
            ])
            ->paginate(10);
    }
}
