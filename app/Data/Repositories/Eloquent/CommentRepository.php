<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\Comment;

class CommentRepository extends AppBaseRepository
{
    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'name' => ['column' => 'comments.name', 'operator' => 'like', 'type' => 'normal'],
        'email' => ['column' => 'comments.email', 'operator' => 'like', 'type' => 'normal'],
        'target_types' => ['column' => 'comments.target_type', 'operator' => 'in', 'type' => 'normal'],
        'active' => ['column' => 'comments.active', 'operator' => '=', 'type' => 'normal'],
        'created_at_from' => ['column' => 'comments.created_at', 'operator' => '>=', 'type' => 'date'],
        'created_at_to' => ['column' => 'comments.created_at', 'operator' => '<=', 'type' => 'date'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Comment::class;
    }
}
