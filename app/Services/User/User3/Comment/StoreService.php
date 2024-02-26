<?php

namespace App\Services\User\User3\Comment;

use App\Data\Repositories\Eloquent\CommentRepository;

class StoreService
{
    /**
     * @var CommentRepository
     */
    protected $repository;

    public function __construct(CommentRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Create comments
     *
     * @return array
     */
    public function handle (array $data)
    {
        return $this->repository->create([
            'name' => $data['name'] ?? null,
            'email' => $data['email'] ?? null,
            'active' => true,
            'content' => $data['content'] ?? null,
            'parent_id' => $data['parent_id'] ?? null,
            'target_type' => $data['target_type'] ?? null,
            'target_id' => $data['target_id'] ?? null,
        ]);
    }
}
