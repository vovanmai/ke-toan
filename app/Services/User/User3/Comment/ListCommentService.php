<?php

namespace App\Services\User\User3\Comment;

use App\Data\Repositories\Eloquent\CommentRepository;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class ListCommentService
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
    public function handle (array $data)
    {
        return $this->repository->with([
            'children',
            'admin',
            'user',
        ])->whereByField('target_id', $data['target_id'])
            ->whereByField('target_type', Comment::TARGET_TYPES[$data['target_type']])
            ->whereNull('parent_id')
            ->where('active', true)
            ->orderBy('id', 'DESC')
            ->paginate(5);
    }
}
