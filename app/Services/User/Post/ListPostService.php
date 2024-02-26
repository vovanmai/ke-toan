<?php

namespace App\Services\User\User2\Post;

use App\Data\Repositories\Eloquent\CategoryRepository;
use App\Data\Repositories\Eloquent\PostRepository;
use App\Models\Category;

class ListPostService
{
    /**
     * @var PostRepository
     */
    protected $repository;

    public function __construct(
        PostRepository $repository,
        CategoryRepository $categoryRepository
    ) {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
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
        $categories = $this->categoryRepository->whereByField('active', true)
            ->orderBy('created_at', 'ASC')
            ->whereNull('parent_id')
            ->whereByField('type', Category::TYPE_POST)
            ->all();

        $categories->map(function ($item) {
            $childrenCat = $item->children->pluck('id')->toArray();
            $childrenCat[] = $item->id;
            $item->posts = $this->repository->whereByField('active', true)
                ->orderBy('created_at', 'DESC')
                ->whereIn('category_id', $childrenCat)
                ->limit(15);
        });

        return $categories;
    }
}
