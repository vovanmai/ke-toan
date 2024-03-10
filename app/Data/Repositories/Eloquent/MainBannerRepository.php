<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\MainBanner;

class MainBannerRepository extends AppBaseRepository
{
    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'title' => ['column' => 'main_banners.title', 'operator' => 'like', 'type' => 'normal'],
        'active' => ['column' => 'main_banners.active', 'operator' => '=', 'type' => 'normal'],
        'created_at_from' => ['column' => 'main_banners.created_at', 'operator' => '>=', 'type' => 'date'],
        'created_at_to' => ['column' => 'main_banners.created_at', 'operator' => '<=', 'type' => 'date'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return MainBanner::class;
    }
}
