<?php

namespace App\Services\User\Post;

use App\Data\Repositories\Eloquent\CategoryRepository;
use App\Data\Repositories\Eloquent\PostRepository;
use App\Models\Category;

class ListByCategoryService
{
    /**
     * @var PostRepository
     */
    protected $repository;

    /**
     * @var CategoryRepository
     */
    protected $catRepo;

    public function __construct(
        PostRepository $repository,
        CategoryRepository $catRepo
    ) {
        $this->repository = $repository;
        $this->catRepo = $catRepo;
    }

    /**
     * Get comments
     *
     * @param string $slug Data
     *
     * @return array
     */
    public function handle (string $slug)
    {
        $category = $this->catRepo
            ->with([
                'childrenRecursive',
            ])
            ->firstOrFailWhere(['slug' => $slug], ['id', 'title', 'slug']);

        $categoryIds = $this->getCategoryIds($category);

        $posts = $this->repository
            ->with([
                'admin' => function($query) {
                    $query->select(['id', 'name']);
                },
                'category',
            ])
            ->whereIn('category_id', $categoryIds)
            ->whereByField('active', true)
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return [
            'category' => $category,
            'posts' => $posts,
        ];
    }

    private function getCategoryIds (Category $category)
    {
        $ids = [];
        $category = $category->toArray();

        array_walk_recursive($category, function ($item, $key) use (&$ids) {
            if ($key == 'id') {
                $ids[] = $item;
            }
        });

        return $ids;
    }
}
