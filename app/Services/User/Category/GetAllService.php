<?php

namespace App\Services\User\Category;

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
                return $query->where('active', true)
                    ->where('show_on_menu', true)
                    ->select(['*']);
            }])
            ->whereByField('type', $type)
            ->whereByField('active', true)
            ->whereByField('show_on_menu', true)
            ->orderBy('order', 'ASC')
            ->orderBy('id', 'ASC')
            ->whereNull('parent_id')
            ->all();
    }
}
