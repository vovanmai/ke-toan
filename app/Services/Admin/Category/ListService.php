<?php

namespace App\Services\Admin\Category;

use App\Data\Repositories\Eloquent\CategoryRepository;

class ListService
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
     * @param array $filters Filters
     *
     * @return
     */
    public function handle (array $filters)
    {
        return $this->repository->search($filters)
            ->with('parentRecursive')
            ->orderByColumns([
                'id' => 'desc',
            ])
            ->paginate(15);
    }
}
