<?php

namespace App\Services\User\User3\Post;

use App\Data\Repositories\Eloquent\PostRepository;

class SearchPostService
{

    /**
     * @var PostRepository
     */
    protected $postRepository;

    public function __construct(
        PostRepository $postRepository
    ) {
        $this->postRepository = $postRepository;
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
        $key = mb_strtolower($data['key'] ?? null);

        return $this->postRepository
            ->scopeQuery(function ($query) use ($key) {
                return $query->where(function ($query) use ($key) {
                    $key = "'%{$key}%'";
                    $query->whereRaw("LOWER(posts.title) LIKE $key")
                        ->orWhereRaw("LOWER(posts.short_description) LIKE $key")
                        ->orWhereRaw("LOWER(categories.title) LIKE $key");
                });
            })
            ->whereByField('posts.active', true)
            ->whereByField('categories.active', true)
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->paginate(5, ['posts.*']);
    }
}
