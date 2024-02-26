<?php

namespace App\Services\User\User3\Comment;

use App\Data\Repositories\Eloquent\CommentRepository;

class ListTopCommentService
{
    /**
     * @var CommentRepository
     */
    protected $repository;

    public function __construct(CommentRepository $repository) {
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
        return $this->repository->with([
            'target',
            'admin',
            'user',
        ])
            ->orderBy('id', 'DESC')
            ->where('active', true)
            ->limit(5)->get();
    }
}
