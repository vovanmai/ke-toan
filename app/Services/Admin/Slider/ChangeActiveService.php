<?php

namespace App\Services\Admin\Slider;

use App\Data\Repositories\Eloquent\SliderRepository;

class ChangeActiveService
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
