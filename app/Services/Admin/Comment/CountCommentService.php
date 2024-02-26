<?php

namespace App\Services\Admin\Comment;

use App\Data\Repositories\Eloquent\CommentRepository;

class CountCommentService
{
    /**
     * @var CommentRepository
     */
    protected $repository;

    public function __construct(CommentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id Id
     *
     * @return boolean
     */
    public function handle ()
    {
        $count = $this->repository->count([
            'is_read' => false,
        ], ['id']);

        return $count;
    }
}
