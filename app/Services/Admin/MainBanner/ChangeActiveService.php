<?php

namespace App\Services\Admin\MainBanner;

use App\Data\Repositories\Eloquent\MainBannerRepository;

class ChangeActiveService
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
     * @return boolean
     */
    public function handle (int $id, array $data)
    {
        $comment = $this->repository->find($id);

        return $this->repository->update([
            'active' => $data['active'],
        ], $comment->id);
    }
}
