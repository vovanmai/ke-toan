<?php

namespace App\Services\Admin\Course;

use App\Data\Repositories\Eloquent\CourseRepository;

class DetailService
{
    /**
     * @var CourseRepository
     */
    protected $repository;

    public function __construct(CourseRepository $repository)
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
