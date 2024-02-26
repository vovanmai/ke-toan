<?php

namespace App\Services\User\User2\Category;

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
     * @param array $data Data
     *
     * @return array
     */
    public function handle (int $type = Category::TYPE_POST)
    {
        return $this->repository->with([
            'childrenRecursive' => function ($query) {
                return $query->where('active', true)
                    ->select(['*']);
            }])
            ->whereByField('type', $type)
            ->whereByField('active', true)
            ->scopeQuery(function ($query) {
                return $query->whereNull('parent_id');
            })
            ->all();
    }
}
