<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\Recruitment;
use App\Models\WebsiteSetting;

class WebsiteSettingRepository extends AppBaseRepository
{
    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'title' => ['column' => 'recruitments.title', 'operator' => 'like', 'type' => 'normal'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return WebsiteSetting::class;
    }
}
