<?php

namespace App\Services\Admin\Recruitment;

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
    public function handle ()
    {
        return $this->repository->with('childrenRecursive')
            ->scopeQuery(function ($query) {
                return $query->whereNull('parent_id');
            })
            ->all();
    }
}
