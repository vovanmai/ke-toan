<?php

namespace App\Services\Admin\Category;

use App\Data\Repositories\Eloquent\CategoryRepository;

class GetAllService
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
    public function handle (array $filters)
    {
        return $this->repository->with([
            'children' => function ($query) {
                return $query->select(['*'])->withCount('activePosts');
            }])
            ->withCount('activePosts')
            ->search($filters)
            ->scopeQuery(function ($query) {
                return $query->whereNull('parent_id');
            })
            ->all();
    }
}
