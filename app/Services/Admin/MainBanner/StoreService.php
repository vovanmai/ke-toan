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
        $maxOrder = $this->repository->orderBy('order', 'DESC')->first(['order']);

        $data['order'] = isset($maxOrder->order) ? $maxOrder->order + 1 : 0;
        $data['active'] = $data['active'] ?? false;

        return $this->repository->create($data);
    }
}
