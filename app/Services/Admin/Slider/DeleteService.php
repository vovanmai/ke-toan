<?php

namespace App\Services\Admin\Slider;

use App\Data\Repositories\Eloquent\SliderRepository;

class DeleteService
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
