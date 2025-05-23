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
     * @param array $data
     * @return void
     */
    public function handle (array $data)
    {
        $data = $data['data'] ?? [];

        if (empty($data)) return;

        $groupByType = collect($data)->groupBy('target_type')->toArray();

        $categoryCourse = [
            'id' => null,
            'title' => 'Đào tạo kế toán',
            'type' => 'course',
            'active_children_recursive' => $this->catRepo
                ->with([
                    'activeChildrenRecursive:id,slug,title,parent_id'
                ])
                ->whereByField('active', true)
                ->whereByField('type', Category::TYPE_COURSE)
                ->whereNull('parent_id')
                ->orderBy('id', 'ASC')
                ->all([
                    'id',
                    'title',
                    'slug',
                ])
                ->toArray()
        ];

        $postCatIds = array_column($groupByType['post'] ?? [], 'target_id');

        $postCats = $this->catRepo
            ->with([
                'activeChildrenRecursive:id,slug,title,parent_id'
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

        foreach ($data as $item) {
            if ($item['target_type'] === 'course') {
                $menus[] = $categoryCourse;
            }

            if ($item['target_type'] === 'post') {
                $menus[] = $postCats[$item['target_id']] ?? null;
            }

            if ($item['target_type'] === 'page') {
                $menus[] = $pages[$item['target_id']] ?? null;
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
