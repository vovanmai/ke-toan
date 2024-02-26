<?php

namespace App\Services\Admin\Slider;

use App\Data\Repositories\Eloquent\SliderRepository;

class DetailService
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
     * @param $id $id Id
     *
     * @return array
     */
    public function handle (int $id)
    {
        return $this->repository->find($id);
    }
}
