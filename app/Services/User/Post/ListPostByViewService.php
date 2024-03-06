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
            ->orderBy('total_view', 'DESC')->limit(15);
    }
}
