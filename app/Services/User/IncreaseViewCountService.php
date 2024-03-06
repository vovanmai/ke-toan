<?php

namespace App\Services\User;

use App\Data\Repositories\Eloquent\WebsiteSettingRepository;
use Illuminate\Support\Facades\Cache;

class IncreaseViewCountService
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
     * IncreaseViewService
     *
     * @return array
     */
    public function handle ()
    {
        $item = $this->repository->first();

        if ($item) {
            $ip = request()->ip();
            $lock = Cache::lock("view_count_{$ip}", 5);

            if ($lock->get()) {
                $item->increment('total_view');
            }
        }
    }
}
