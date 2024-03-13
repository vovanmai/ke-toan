<?php

namespace App\Services\Admin\CourseCategory;

use App\Data\Repositories\Eloquent\CategoryRepository;

class DetailService
{
    /**
     * @var CategoryRepository
     */
    protected $repository;

    public function __construct(CategoryRepository $repository)
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
