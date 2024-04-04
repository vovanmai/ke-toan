<?php

namespace App\Services\Admin\SettingMainMenu;

use App\Data\Repositories\Eloquent\MainMenuSettingRepository;
use App\Models\MainMenuSetting;

class UpdateService
{
    /**
     * @var MainMenuSettingRepository
     */
    protected $mainMenuSettingRepo;

    public function __construct(
        MainMenuSettingRepository $mainMenuSettingRepo
    ) {
        $this->mainMenuSettingRepo = $mainMenuSettingRepo;
    }

    /**
     * @return
     */
    public function handle (array $data)
    {
        MainMenuSetting::truncate();
        if (!empty($data['data'])) {
            return $this->mainMenuSettingRepo->insert($data['data']);
        }
    }
}
