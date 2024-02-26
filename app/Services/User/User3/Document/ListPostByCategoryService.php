<?php

namespace App\Services\User\User3\Document;

use App\Data\Repositories\Eloquent\CategoryRepository;
use App\Data\Repositories\Eloquent\PostRepository;

class ListPostByCategoryService
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var PostRepository
     */
    protected $postRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        PostRepository $postRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * Get comments
     *
     * @param array $data Data
     *
     * @return array
     */
    public function handle (array $ids)
    {
        return $this->postRepository->with('admin')
            ->orderBy('created_at', 'DESC')
            ->whereIn('category_id', $ids)
            ->paginate(10);
    }
}
