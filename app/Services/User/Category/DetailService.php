<?php

namespace App\Services\User\User2\Category;

use App\Data\Repositories\Eloquent\CategoryRepository;

class DetailService
{
    /**
     * @var CategoryRepository
     */
    protected $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $slug Slug
     *
     * @return array
     */
    public function handle ($slug)
    {
        return $this->repository->firstOrFailWhere(['slug' => $slug]);
    }
}
