<?php

namespace App\Services\User\MainBanner;

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
    public function handle ()
    {
        return $this->repository->search([
            'active' => true,
        ])->orderBy('id', 'DESC')
            ->all();
    }
}
