<?php

namespace App\Services\Admin\WebsiteSetting;

use App\Data\Repositories\Eloquent\WebsiteSettingRepository;
use App\Services\Admin\Traits\RemoveFileTrait;

class StoreService
{

    use RemoveFileTrait;

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

        if (!empty($data['is_remove_header_banner'])) {
            $this->removeFile($setting->header_banner['store_name'] ?? null);
        } elseif (!isset($data['header_banner'])) {
            unset($data['header_banner']);
        }

        if ($setting) {
            return $this->repository->update($data, $setting->id);
        }
        return $this->repository->create($data);
    }
}
