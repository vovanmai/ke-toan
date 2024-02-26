<?php

namespace App\Services\Admin\Course;

use App\Data\Repositories\Eloquent\CourseRepository;

class UpdateService
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
     * Create website setting
     *
     * @return array
     */
    public function handle (int $id, array $data)
    {
        return $this->repository->update($data, $id);
    }
}
