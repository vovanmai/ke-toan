<?php

namespace App\Services\User\Post;

use App\Data\Repositories\Eloquent\PostRepository;

class ListByCategoryService
{
    /**
     * @var PostRepository
     */
    protected $repository;

    public function __construct(
        PostRepository $repository
    ) {
        $this->repository = $repository;
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
        $posts = $this->repository->whereByField('slug', $slug)
            ->whereByField('active', true)
            ->orderBy('order', 'ASC')
            ->orderBy('id', 'ASC')
            ->paginate(10);
        return $posts;
    }
}
