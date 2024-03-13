<?php

namespace App\Services\User\Course;

use App\Data\Repositories\Eloquent\CategoryRepository;
use App\Data\Repositories\Eloquent\CourseRepository;
use App\Models\Course;
use Illuminate\Support\Facades\Cache;


class DetailService
{
    /**
     * @var CourseRepository
     */
    protected $repository;

    /**
     * @var CategoryRepository
     */
    protected $catRepo;

    public function __construct(
        CourseRepository $repository,
        CategoryRepository $catRepo
    ) {
        $this->repository = $repository;
        $this->catRepo = $catRepo;
    }

    /**
     * @return array
     */
    public function handle (string $cat, string $slug)
    {
        $this->catRepo->firstOrFailWhere([
            'slug' => $cat,
            'active' => true,
        ], ['id']);

        $post = $this->repository->with([
            'admin',
            'category',
        ])->firstOrFailWhere([
            'slug' => $slug,
            'active' => true,
        ]);

        $this->increaseViewCount($post);

        return $post;
    }

    /**
     * Increase view count of post
     *
     * @return void
     */
    public function increaseViewCount(Course $course)
    {
        $ip = request()->ip();

        $lock = Cache::lock("course_{$ip}_{$course->id}", 60);

        if ($lock->get()) {
            $course->total_view++;

            $course->save();
        }
    }
}
