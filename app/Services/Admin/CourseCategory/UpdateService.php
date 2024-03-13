<?php

namespace App\Services\Admin\CourseCategory;

use App\Data\Repositories\Eloquent\CategoryRepository;
use App\Models\Category;

class UpdateService
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
     * @param array $data Data
     *
     * @return array
     */
    public function handle (int $id, array $data)
    {
        $data['type'] = $data['type'] ?? Category::TYPE_POST;
        return $this->repository->update($data, $id);
    }
}
