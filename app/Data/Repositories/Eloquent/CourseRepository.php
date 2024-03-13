<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\Course;

class CourseRepository extends AppBaseRepository
{
    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'title' => ['column' => 'courses.title', 'operator' => 'like', 'type' => 'normal'],
        'category_ids' => ['column' => 'courses.category_id', 'operator' => 'in', 'type' => 'normal'],
        'created_at_from' => ['column' => 'courses.created_at', 'operator' => '>=', 'type' => 'date'],
        'created_at_to' => ['column' => 'courses.created_at', 'operator' => '<=', 'type' => 'date'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Course::class;
    }
}
