<?php

namespace App\Services\Admin\Slider;

use App\Data\Repositories\Eloquent\SliderRepository;

class StoreService
{

    /**
     * @var SliderRepository
     */
    protected $repository;

    public function __construct(SliderRepository $repository)
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
