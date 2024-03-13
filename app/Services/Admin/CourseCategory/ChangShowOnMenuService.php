<?php

namespace App\Services\Admin\CourseCategory;

use App\Data\Repositories\Eloquent\CategoryRepository;

class ChangShowOnMenuService
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
     * @param int $id Id
     *
     * @return array
     */
    public function handle (int $id, array $data)
    {
        $cat = $this->repository->find($id);
        return $this->repository->update($data, $cat->id);
    }
}
