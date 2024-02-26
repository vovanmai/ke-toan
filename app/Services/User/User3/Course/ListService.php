<?php

namespace App\Services\User\User3\Course;

use App\Data\Repositories\Eloquent\CourseRepository;

class ListService
{
    /**
     * @var CourseRepository
     */
    protected $repository;

    public function __construct(CourseRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @param array $data Data
     *
     * @return array
     */
    public function handle ()
    {
        return $this->repository->with([
            'admin',
        ])->orderBy('id', 'DESC')
            ->whereByField('active', true)
            ->paginate(10);
    }
}
