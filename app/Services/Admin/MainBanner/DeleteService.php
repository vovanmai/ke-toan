<?php

namespace App\Services\Admin\MainBanner;

use App\Data\Repositories\Eloquent\MainBannerRepository;
use App\Services\Admin\Traits\RemoveFileTrait;

class DeleteService
{
    use RemoveFileTrait;

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

        if ($fileName = $item->image['store_name'] ?? null) {
            $this->removeFile($fileName);
        }

        $this->repository->delete($item->id);
    }
}
