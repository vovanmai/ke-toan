<?php

namespace App\Services\User\Slider;

use App\Data\Repositories\Eloquent\MainBannerRepository;

class ListService
{
    /**
     * @var MainBannerRepository
     */
    protected $repository;

    public function __construct(MainBannerRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @param array $data Data
     *
     * @return array
     */
    public function handle (array $data, int $limit = 3)
    {
        return $this->repository->search($data)->orderBy('created_at', 'DESC')->limit($limit);
    }
}
