<?php

namespace App\Services\Admin\SettingMainMenu;

use App\Data\Repositories\Eloquent\CategoryRepository;
use App\Data\Repositories\Eloquent\PageRepository;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ListService
{
    /**
     * @var PageRepository
     */
    protected $pageRepo;

    /**
     * @var CategoryRepository
     */
    protected $catRepo;

    public function __construct(
        PageRepository $pageRepo,
        CategoryRepository $catRepo
    )
    {
        $this->pageRepo = $pageRepo;
        $this->catRepo = $catRepo;
    }

    /**
     * @return
     */
    public function handle ()
    {
        $data = [
              [
                  "id" => null,
                  "name" => 'Khóa học kế toán',
                  'type' => 'course'
              ]
        ];

        $pages = $this->pageRepo->whereByField('active', true)
            ->orderBy('id', 'ASC')
            ->all(['id', 'title as name', DB::raw("'page' as type")])
            ->toArray();

        $categories = $this->catRepo->whereByField('active', true)
            ->whereNull('parent_id')
            ->whereByField('type', Category::TYPE_POST)
            ->orderBy('id', 'ASC')
            ->all(['id', 'title as name', DB::raw("'post' as type")])
            ->toArray();

        $data = array_merge($data, $categories, $pages);
        return $data;
    }
}
