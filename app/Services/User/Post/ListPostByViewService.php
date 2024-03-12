<?php

namespace App\Services\User\Post;

use App\Data\Repositories\Eloquent\PostRepository;
use App\Models\Category;

class ListPostByViewService
{
    /**
     * @var PostRepository
     */
    protected $repository;

    public function __construct(
        PostRepository $repository
    ) {
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
        return $this->repository->whereByField('active', true)
            ->with('category')
            ->whereHas('category', function ($query) {
                $query->where('display_type', Category::TYPE_DISPLAY_LIST);
            })
            ->orderBy('total_view', 'DESC')
            ->limit(5, [
                'slug',
                'title',
                'image',
                'category_id',
            ]);
    }
}
