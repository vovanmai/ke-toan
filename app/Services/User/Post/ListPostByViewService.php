<?php

namespace App\Services\User\Post;

use App\Data\Repositories\Eloquent\PostRepository;

class ListPostByViewService
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
     * @param array $data Data
     *
     * @return array
     */
    public function handle ()
    {
        return $this->repository->whereByField('active', true)
            ->with('category')
            ->orderBy('total_view', 'DESC')
            ->limit(5, [
                'slug',
                'title',
                'image',
                'category_id',
            ]);
    }
}
