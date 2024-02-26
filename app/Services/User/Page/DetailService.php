<?php

namespace App\Services\User\Page;

use App\Data\Repositories\Eloquent\PageRepository;
use App\Data\Repositories\Eloquent\PostRepository;

class DetailService
{
    /**
     * @var PostRepository
     */
    protected $repository;

    public function __construct(
        PageRepository $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * Get comments
     *
     * @param array $data Data
     *
     */
    public function handle (string $slug)
    {
        return $this->repository->firstOrFailWhere(['slug' => $slug]);
    }
}
