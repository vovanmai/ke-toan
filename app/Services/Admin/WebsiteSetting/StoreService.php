<?php

namespace App\Services\Admin\WebsiteSetting;

use App\Data\Repositories\Eloquent\WebsiteSettingRepository;

class StoreService
{

    /**
     * @var WebsiteSettingRepository
     */
    protected $repository;

    public function __construct(WebsiteSettingRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create website setting
     *
     * @return array
     */
    public function handle (array $data)
    {
        $setting = $this->repository->first();

        if ($setting) {
            return $this->repository->update($data, $setting->id);
        }
        return $this->repository->create($data);
    }
}
