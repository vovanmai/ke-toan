<?php

namespace App\Data\Repositories\Eloquent;


use App\Models\CourseImage;

class CourseImageRepository extends AppBaseRepository
{
    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'created_at_from' => ['column' => 'course_images.created_at', 'operator' => '>=', 'type' => 'date'],
        'created_at_to' => ['column' => 'course_images.created_at', 'operator' => '<=', 'type' => 'date'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return CourseImage::class;
    }
}
