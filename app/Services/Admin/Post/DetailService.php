<?php

namespace App\Services\Admin\Post;

use App\Data\Repositories\Eloquent\PostRepository;
use App\Data\Repositories\Eloquent\ProductRepository;

class DetailService
{
    /**
     * @var ProductRepository
     */
    protected $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id $id Id
     *
     * @return array
     */
    public function handle (int $id)
    {
        return $this->repository->with([
            'category',
        ])->find($id);
    }
}
