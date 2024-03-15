<?php

namespace App\Services\Admin\CourseImage;

use App\Data\Repositories\Eloquent\CourseImageRepository;

class StoreService
{
    /**
     * @var CourseImageRepository
     */
    protected $repository;

    public function __construct(CourseImageRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $filters Filters
     *
     * @return
     */
    public function handle (array $data)
    {

        $insertData = [];

        foreach ($data['images'] as $image) {
            $insertData[] = [
                'image' => json_encode($image),
                'admin_id' => auth()->id(),
                'active' => true,
            ];
        }

        $this->repository->insert($insertData);
    }
}
