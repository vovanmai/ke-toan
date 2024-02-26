<?php

namespace App\Services\User\User2\Course;

use App\Data\Repositories\Eloquent\CourseRepository;

class ListRelatedCourseService
{
    /**
     * @var CourseRepository
     */
    protected $repository;

    public function __construct(CourseRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function handle ($notSlug)
    {
        return $this->repository->with([
            'admin',
        ])
            ->whereByField('slug', $notSlug, '!=')
            ->orderBy('id', 'DESC')
            ->limit(3);
    }
}
