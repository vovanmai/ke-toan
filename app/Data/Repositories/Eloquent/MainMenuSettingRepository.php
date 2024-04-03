<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\MainMenuSetting;

class MainMenuSettingRepository extends AppBaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return MainMenuSetting::class;
    }
}
