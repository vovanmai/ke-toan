<?php

namespace App\Services\User\User2\Document;

use App\Data\Repositories\Eloquent\PostRepository;

class ListLastedPostService
{
    /**
     * @var PostRepository
     */
    protected $repository;

    public function __construct(PostRepository $repository) {
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
            'admin',
        ])->orderBy('id', 'DESC')
            ->limit(5);
    }
}
