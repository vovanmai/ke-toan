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
        $cat = $this->catRepository->with([
            'activeChildrenRecursive'
        ])->firstOrFailWhere(['slug' => $slug, 'active' => true])->toArray();

        $catIds = [];
        array_walk_recursive($cat, function ($item, $key) use (&$catIds) {
            if ($key == 'id') {
                $catIds[] = $item;
            }
        });

        $items = $this->repository->orderBy('id', 'DESC')
            ->whereIn('category_id', $catIds)
            ->whereByField('active', true)
            ->with('category')
            ->paginate(9);

        return [
            'category' => $cat,
            'items' => $items,
        ];
    }
}
