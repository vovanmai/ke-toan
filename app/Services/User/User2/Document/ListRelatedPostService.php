<?php

namespace App\Services\User\User2\Document;

use App\Data\Repositories\Eloquent\PostRepository;

class ListRelatedPostService
{
    /**
     * @var PostRepository
     */
    protected $repository;

    public function __construct(PostRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function handle (array $data)
    {
        return $this->repository->with([
            'admin',
        ])
            ->whereByField('slug', $data['slug'], '!=')
            ->whereIn('category_id', $data['category_ids'])
            ->whereByField('active', true)
            ->orderBy('created_at', 'DESC')
            ->limit(5);
    }
}
