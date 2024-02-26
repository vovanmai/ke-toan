<?php

namespace App\Services\User\User3\Course;

use App\Data\Repositories\Eloquent\CourseRepository;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class DetailService
{
    /**
     * @var CourseRepository
     */
    protected $repository;

    public function __construct(CourseRepository $repository) {
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
