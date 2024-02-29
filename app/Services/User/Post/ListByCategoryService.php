<?php

namespace App\Services\User\Post;

use App\Data\Repositories\Eloquent\CategoryRepository;
use App\Data\Repositories\Eloquent\PostRepository;

class ListByCategoryService
{
    /**
     * @var PostRepository
     */
    protected $repository;

    /**
     * @var CategoryRepository
     */
    protected $catRepo;

    public function __construct(
        PostRepository $repository,
        CategoryRepository $catRepo
    ) {
        $this->repository = $repository;
        $this->catRepo = $catRepo;
    }

    /**
     * Get comments
     *
     * @param string $slug Data
     *
     * @return array
     */
    public function handle (string $slug)
    {
        $cat = $this->catRepo->firstOrFailWhere(['slug' => $slug], ['id']);

        $posts = $this->repository->whereByField('category_id', $cat->id)
            ->whereByField('active', true)
            ->orderBy('id', 'DESC')
            ->paginate(10);
        return $posts;
    }
}
