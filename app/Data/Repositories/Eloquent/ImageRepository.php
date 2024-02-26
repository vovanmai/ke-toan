<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\Image;

class ImageRepository extends AppBaseRepository
{
    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'name' => ['column' => 'images.name', 'operator' => 'like', 'type' => 'normal'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Image::class;
    }
}
