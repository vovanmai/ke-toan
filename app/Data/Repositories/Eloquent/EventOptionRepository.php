<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\EventOptions;

class EventOptionRepository extends AppBaseRepository
{

    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'title' => ['column' => 'event_options.title', 'operator' => 'like', 'type' => 'normal'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return EventOptions::class;
    }
}
