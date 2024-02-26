<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository extends AppBaseRepository
{
    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'title' => ['column' => 'categories.title', 'operator' => 'like', 'type' => 'normal'],
        'type' => ['column' => 'categories.type', 'operator' => '=', 'type' => 'normal'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Category::class;
    }

    /**
     * Get categories
     *
     * @return Collection
     */
    public function getCategories (array $filters)
    {
        return $this->with('childrenRecursive')
            ->scopeQuery(function ($query) {
                return $query->whereNull('parent_id');
            })
            ->all();
    }
}
