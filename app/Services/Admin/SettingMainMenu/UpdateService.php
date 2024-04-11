<?php

namespace App\Services\Admin\SettingMainMenu;

use App\Data\Repositories\Eloquent\CategoryRepository;
use App\Data\Repositories\Eloquent\MainMenuSettingRepository;
use App\Data\Repositories\Eloquent\PageRepository;
use App\Models\Category;
use App\Models\MainMenuSetting;
use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\DB;

class UpdateService
{
    /**
     * @var MainMenuSettingRepository
     */
    protected $mainMenuSettingRepo;

    /**
     * @var CategoryRepository
     */
    protected $catRepo;

    /**
     * @var PageRepository
     */
    protected $pageRepo;

    public function __construct(
        MainMenuSettingRepository $mainMenuSettingRepo,
        CategoryRepository $catRepo,
        PageRepository $pageRepo
    ) {
        $this->mainMenuSettingRepo = $mainMenuSettingRepo;
        $this->catRepo = $catRepo;
        $this->pageRepo = $pageRepo;
    }

    /**
     * @return
     */
    public function handle (array $data)
    {
        MainMenuSetting::truncate();
        if (!empty($data['data'])) {
            $this->mainMenuSettingRepo->insert($data['data']);
        }

        $selectedMenus = $this->mainMenuSettingRepo->orderBy('id', 'ASC')->all();

        $groupByType = $selectedMenus->groupBy('target_type')->toArray();

        $categoryCourse = [
            'id' => null,
            'title' => 'Khóa học kế toán',
            'type' => 'course',
            'children_recursive' => $this->catRepo->whereByField('active', true)
                ->whereByField('type', Category::TYPE_COURSE)
                ->orderBy('id', 'ASC')
                ->all([
                    'title',
                    'slug',
                ])
        ];

        $postCatIds = array_column($groupByType['post'] ?? [], 'target_id');

        $postCats = $this->catRepo
            ->with([
                'childrenRecursive:slug,title,parent_id'
            ])
            ->whereByField('type', Category::TYPE_POST)
            ->whereByField('active', true)
            ->whereNull('parent_id')
            ->whereIn('id', $postCatIds)
            ->all([
                'id',
                'slug',
                'title',
                DB::raw("'post' as type"),
            ])
            ->keyBy('id')
            ->toArray();

        $pagIds = array_column($groupByType['page'] ?? [], 'target_id');

        $pages = $this->pageRepo
            ->whereByField('active', true)
            ->whereIn('id', $pagIds)
            ->all([
                'id',
                'slug',
                'title',
                DB::raw("'page' as type"),
            ])
            ->keyBy('id')
            ->toArray();

        $menus = [];

        foreach ($selectedMenus as $item) {
            if ($item->target_type === 'course') {
                $menus[] = $categoryCourse;
            }

            if ($item->target_type === 'post') {
                $menus[] = $postCats[$item->target_id] ?? null;
            }

            if ($item->target_type === 'page') {
                $menus[] = $pages[$item->target_id] ?? null;
            }
        }

        $webSetting = WebsiteSetting::first();

        if ($webSetting) {
            $webSetting->update([
                'main_menu' => array_filter($menus),
            ]);
        } else {
            WebsiteSetting::create([
                'main_menu' => array_filter($menus),
            ]);
        }
    }
}
