<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\Slider;

class SliderRepository extends AppBaseRepository
{
    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'title' => ['column' => 'sliders.title', 'operator' => 'like', 'type' => 'normal'],
        'active' => ['column' => 'sliders.active', 'operator' => '=', 'type' => 'normal'],
        'created_at_from' => ['column' => 'sliders.created_at', 'operator' => '>=', 'type' => 'date'],
        'created_at_to' => ['column' => 'sliders.created_at', 'operator' => '<=', 'type' => 'date'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Slider::class;
    }
}
