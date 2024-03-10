<?php

namespace App\Services\Admin\MainBanner;

use App\Data\Repositories\Eloquent\MainBannerRepository;

class StoreService
{

    /**
     * @var MainBannerRepository
     */
    protected $repository;

    public function __construct(MainBannerRepository $repository)
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
        return $this->repository->create($data);
    }
}
