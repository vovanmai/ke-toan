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
     * @return array
     */
    public function handle ()
    {
        return $this->repository->with([
            'children' => function ($query) {
                return $query->select(['*'])->withCount('activePosts');
            }])
            ->withCount('activePosts')
            ->scopeQuery(function ($query) {
                return $query->whereNull('parent_id');
            })
            ->all();
    }
}
