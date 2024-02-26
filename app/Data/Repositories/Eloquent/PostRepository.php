<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\Post;

class PostRepository extends AppBaseRepository
{
    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'title' => ['column' => 'posts.title', 'operator' => 'like', 'type' => 'normal'],
        'category_id' => ['column' => 'posts.category_id', 'operator' => '=', 'type' => 'normal'],
        'category_ids' => ['column' => 'posts.category_id', 'operator' => 'in', 'type' => 'normal'],
        'created_at_from' => ['column' => 'posts.created_at', 'operator' => '>=', 'type' => 'date'],
        'created_at_to' => ['column' => 'posts.created_at', 'operator' => '<=', 'type' => 'date'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Post::class;
    }
}
