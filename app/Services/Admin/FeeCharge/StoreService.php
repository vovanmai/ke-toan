<?php

namespace App\Services\Admin\FeeCharge;

use App\Data\Repositories\Eloquent\FeeChargeRepository;

class StoreService
{

    /**
     * @var FeeChargeRepository
     */
    protected $repository;

    public function __construct(FeeChargeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create website setting
     *
     * @return array
     */
    public function handle (array $data)
    {
        $fee = $this->repository->first();

        if ($fee) {
            return $this->repository->update($data, $fee->id);
        }
        return $this->repository->create($data);
    }
}
