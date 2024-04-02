<?php

namespace App\Services\User;

use App\Data\Repositories\Eloquent\CategoryRepository;
use App\Data\Repositories\Eloquent\CourseRepository;
use App\Data\Repositories\Eloquent\PostRepository;
use Illuminate\Support\Facades\Cache;


class IndexService
{
    /**
     * @var CategoryRepository
     */
    protected $catRepo;

    /**
     * @var CourseRepository
     */
    protected $courseRepository;

    /**
     * @var PostRepository
     */
    protected $repository;

    public function __construct(
        CategoryRepository $catRepo,
        CourseRepository $courseRepository,
        PostRepository $repository
    ) {
        $this->repository = $repository;
        $this->catRepo = $catRepo;
        $this->courseRepository = $courseRepository;
    }

    /**
     * @return array
     */
    public function handle ()
    {
        $this->increaseViewCount();

        $categories = $this->catRepo
            ->with('childrenRecursive')
            ->whereByField('active', true)
            ->whereNull('parent_id')
            ->orderBy('order', 'ASC')
            ->orderBy('id', 'ASC')
            ->all();

        foreach ($categories as &$category) {
            $catIds = [];
            $categoryData = $category->toArray();
            array_walk_recursive($categoryData, function ($item, $key) use (&$catIds) {
                if ($key == 'id') {
                    $catIds[] = $item;
                }
            });

            $category->activePosts = $this->repository->whereIn('category_id', $catIds)
                ->whereByField('active', true)
                ->orderBy('id', 'DESC')
                ->limit(6);
        }


        $courses = $this->courseRepository->whereByField('active', true)
            ->orderBy('id', 'DESC')
            ->limit(9);

        return [
            'categories' => $categories,
            'courses' => $courses,
        ];
    }

    /**
     * Increase view count of post
     *
     * @return void
     */
    public function increaseViewCount()
    {
        $ip = request()->ip();

        $lock = Cache::lock("page_index_{$ip}", 30);

        if ($lock->get()) {
            $webSetting = app('web_setting');

            if ($webSetting) {
                $webSetting->total_view = $webSetting->total_view + 1;
                $webSetting->save();
            }
        }
    }
}
