<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\Page;

class PageRepository extends AppBaseRepository
{
    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'title' => ['column' => 'pages.title', 'operator' => 'like', 'type' => 'normal'],
        'created_at_from' => ['column' => 'pages.created_at', 'operator' => '>=', 'type' => 'date'],
        'created_at_to' => ['column' => 'pages.created_at', 'operator' => '<=', 'type' => 'date'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Page::class;
    }
}
