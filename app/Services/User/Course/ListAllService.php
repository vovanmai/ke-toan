<?php

namespace App\Services\User\Course;

use App\Data\Repositories\Eloquent\CourseRepository;


class ListAllService
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
     * @return array
     */
    public function handle ()
    {
        return $this->repository
            ->whereByField('active', true)
            ->orderBy('id', 'DESC')
            ->with('category')
            ->paginate(9, [
                'id',
                'slug',
                'title',
                'category_id',
                'created_at',
                'image',
                'total_view',
            ]);
    }
}
