<?php

namespace App\Services\Admin\Slider;

use App\Data\Repositories\Eloquent\SliderRepository;

class UpdateService
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
    public function handle (int $id, array $data)
    {
        return $this->repository->update($data, $id);
    }
}
