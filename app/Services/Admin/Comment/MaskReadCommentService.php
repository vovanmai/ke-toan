<?php

namespace App\Services\Admin\Comment;

use App\Data\Repositories\Eloquent\CommentRepository;
use App\Models\Comment;

class MaskReadCommentService
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
        return $this->repository->updateWhere([
            'is_read' => false,
        ], [
            'is_read' => true,
        ]);
    }
}
