<?php

namespace App\Services\User;

use App\Data\Repositories\Eloquent\CategoryRepository;
use App\Data\Repositories\Eloquent\CourseRepository;
use App\Data\Repositories\Eloquent\PageRepository;
use App\Data\Repositories\Eloquent\PostRepository;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;


class GetMainMenuService
{
    /**
     * @var CategoryRepository
     */
    protected $catRepo;

    /**
     * @var PageRepository
     */
    protected $pageRepo;

    public function __construct(
        CategoryRepository $catRepo,
        PageRepository $pageRepo
    ) {
        $this->catRepo = $catRepo;
        $this->pageRepo = $pageRepo;
    }

    /**
     * @return array
     */
    public function handle ()
    {
        $courseCats = $this->catRepo
            ->whereByField('type', Category::TYPE_COURSE)
            ->whereByField('active', true)
            ->orderBy('order', 'ASC')
            ->orderBy('id', 'ASC')
            ->whereNull('parent_id')
            ->all([
                'id',
                'title',
                'slug',
            ]);

        return [
            'course_cats' => $courseCats
        ];
    }
}
