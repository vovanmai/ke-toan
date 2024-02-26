<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\Event;

class EventRepository extends AppBaseRepository
{

    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'admin_id' => ['column' => 'events.admin_id', 'operator' => 'like', 'type' => 'normal'],
        'title' => ['column' => 'events.title', 'operator' => 'like', 'type' => 'normal'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Event::class;
    }
}
