<?php

namespace App\Services\User\User3\Recruitment;

use App\Data\Repositories\Eloquent\RecruitmentRepository;
use Illuminate\Support\Facades\Cache;

class DetailService
{
    /**
     * @var RecruitmentRepository
     */
    protected $repository;

    public function __construct(RecruitmentRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function handle ($slug)
    {
        $item = $this->repository->with([
            'admin',
        ])->firstOrFailWhere([
            'slug' => $slug
        ]);

        $this->increaseViewCount($item);

        return $item;
    }

    /**
     * Increase view count
     *
     * @return void
     */
    public function increaseViewCount($item)
    {
        $ip = request()->ip();

        $lock = Cache::lock("course_{$ip}_{$item->id}", 60);

        if ($lock->get()) {
            $item->total_view++;

            $item->save();
        }
    }
}
