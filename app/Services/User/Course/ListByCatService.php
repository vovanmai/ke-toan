<?php

namespace App\Services\User\Course;

use App\Data\Repositories\Eloquent\CategoryRepository;
use App\Data\Repositories\Eloquent\CourseRepository;


class ListByCatService
{
    /**
     * @var CourseRepository
     */
    protected $repository;

    /**
     * @var CategoryRepository
     */
    protected $catRepository;

    public function __construct(
        CourseRepository $repository,
        CategoryRepository $catRepository
    ) {
        $this->repository = $repository;
        $this->catRepository = $catRepository;
    }

    /**
     * @return array
     */
    public function handle ($slug)
    {
        $cat = $this->catRepository->firstOrFailWhere(['slug' => $slug, 'active' => true]);

        $items = $this->repository->orderBy('id', 'DESC')
            ->whereByField('category_id', $cat->id)
            ->with('category')
            ->paginate(9);

        return [
            'category' => $cat,
            'items' => $items,
        ];
    }
}
