<?php

namespace App\Services\Admin\Category;

use App\Data\Repositories\Eloquent\CategoryRepository;
use App\Models\Category;

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
    public function handle (int $type = Category::TYPE_POST)
    {
        return $this->repository->with([
            'childrenRecursive' => function ($query) {
                return $query->select(['*'])->withCount('activePosts');
            }])
            ->whereByField('type', $type)
            ->withCount('activePosts')
            ->scopeQuery(function ($query) {
                return $query->whereNull('parent_id');
            })
            ->all();
    }
}
