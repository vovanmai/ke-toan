<?php

namespace App\Services\User\Category;

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
            'childrenRecursive' => function ($query) {
                return $query->where('active', true)
                    ->select(['*']);
            }])
            ->whereByField('active', true)
            ->orderBy('order', 'ASC')
            ->orderBy('id', 'ASC')
            ->whereNull('parent_id')
            ->all();
    }
}
