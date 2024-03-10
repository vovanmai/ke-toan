<?php

namespace App\Services\Admin\MainBanner;

use App\Data\Repositories\Eloquent\MainBannerRepository;

class DeleteService
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
     * @param int $id Id
     *
     * @return array
     */
    public function handle (int $id)
    {
        $item = $this->repository->find($id);

        $this->repository->delete($item->id);
    }
}
