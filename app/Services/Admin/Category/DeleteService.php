<?php

namespace App\Services\Admin\Category;

use App\Data\Repositories\Eloquent\CategoryRepository;

class DeleteService
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
     * @param int $id Id
     *
     * @return array
     */
    public function handle (int $id)
    {
        $cats = $this->repository->with('childrenRecursive')->find($id)->toArray();
        $deleteIds = [];
        array_walk_recursive($cats, function ($item, $key) use (&$deleteIds) {
            if ($key == 'id') {
                $deleteIds[] = $item;
            }
        });


        $this->repository->delete($id);

        return $deleteIds;
    }
}
