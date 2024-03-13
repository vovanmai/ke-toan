<?php

namespace App\Services\User\Course;

use App\Data\Repositories\Eloquent\CourseRepository;

class ListByViewService
{
    /**
     * @var CourseRepository
     */
    protected $repository;

    public function __construct(
        CourseRepository $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * Get comments
     *
     * @param array $data Data
     *
     * @return array
     */
    public function handle ()
    {
        return $this->repository->whereByField('active', true)
            ->with('category')
            ->orderBy('total_view', 'DESC')
            ->limit(5, [
                'slug',
                'title',
                'image',
                'category_id',
            ]);
    }
}
