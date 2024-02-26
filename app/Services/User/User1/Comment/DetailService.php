<?php

namespace App\Services\User\User1\Comment;

use App\Data\Repositories\Eloquent\CommentRepository;

class DetailService
{
    /**
     * @var CommentRepository
     */
    protected $repository;

    public function __construct(CommentRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function handle ($slug)
    {
        return $this->repository->with([
            'previewImage',
            'admin',
        ])->firstOrFailWhere([
            'slug' => $slug
        ]);
    }
}
