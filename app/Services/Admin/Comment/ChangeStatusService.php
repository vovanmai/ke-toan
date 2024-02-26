<?php

namespace App\Services\Admin\Comment;

use App\Data\Repositories\Eloquent\CommentRepository;

class ChangeStatusService
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
    public function handle (int $id, array $data)
    {
        $comment = $this->repository->find($id);

        return $this->repository->update([
            'active' => $data['active']
        ], $comment->id);
    }
}
