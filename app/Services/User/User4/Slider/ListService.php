<?php

namespace App\Services\User\User4\Slider;

use App\Data\Repositories\Eloquent\SliderRepository;

class ListService
{
    /**
     * @var SliderRepository
     */
    protected $repository;

    public function __construct(SliderRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @param array $data Data
     *
     * @return array
     */
    public function handle (array $data, int $limit = 10)
    {
        return $this->repository->search($data)
            ->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->map(function ($item) {
                return $item->image['url'];
            });
    }
}
