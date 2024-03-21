<?php

namespace App\Services\Admin\MainBanner;

use App\Data\Repositories\Eloquent\MainBannerRepository;
use App\Services\Admin\Traits\RemoveFileTrait;

class UpdateService
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
     * Create website setting
     *
     * @return array
     */
    public function handle (int $id, array $data)
    {
        $data['active'] = $data['active'] ?? false;

        $item = $this->repository->find($id);

        if ($data['image'] ?? null) {
            $this->removeFile($item->image['store_name'] ?? null);
        }

        return $this->repository->update($data, $id);
    }
}
