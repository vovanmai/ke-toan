<?php

namespace App\Services\Admin\SettingMainMenu;

use App\Data\Repositories\Eloquent\CategoryRepository;
use App\Data\Repositories\Eloquent\MainMenuSettingRepository;
use App\Data\Repositories\Eloquent\PageRepository;
use App\Models\Category;
use Illuminate\Support\Collection;
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

    /**
     * @var MainMenuSettingRepository
     */
    protected $mainMenuRepo;

    public function __construct(
        PageRepository $pageRepo,
        MainMenuSettingRepository $mainMenuRepo,
        CategoryRepository $catRepo
    )
    {
        $this->pageRepo = $pageRepo;
        $this->mainMenuRepo = $mainMenuRepo;
        $this->catRepo = $catRepo;
    }

    /**
     * @return
     */
    public function handle ()
    {
        $data = [
            [
                'id' => null,
                'title' => 'Khóa học kế toán',
                'type' => 'course'
            ]
        ];

        $pages = $this->pageRepo->whereByField('active', true)
            ->orderBy('id', 'ASC')
            ->all(['id', 'title', DB::raw("'page' as type")])
            ->toArray();

        $categories = $this->catRepo->whereByField('active', true)
            ->whereNull('parent_id')
            ->whereByField('type', Category::TYPE_POST)
            ->orderBy('id', 'ASC')
            ->all(['id', 'title', DB::raw("'post' as type")])
            ->toArray();

        $data = array_merge($data, $categories, $pages);

        $allMenus = collect($data)->groupBy('type')->toArray();

        $allSelectedMenu = $this->mainMenuRepo->orderBy('id', 'ASC')->all();

        return [
            'availableMenu' => $this->getAvailableMenu($data, $allSelectedMenu->groupBy('target_type')->toArray()),
            'selectedMenu' => $this->getSelectedMenu($allSelectedMenu, $allMenus),
        ];
    }

    private function getAvailableMenu(array $data, array $selectedMenu): array
    {
        $availableMenu = [];
        foreach ($data as $key => $item) {
            $ids = collect($selectedMenu[$item['type']] ?? [])->pluck('target_id')->toArray();
            if (!in_array($item['id'], $ids)) {
                $availableMenu[] = $item;
            }
        }
        return $availableMenu;
    }

    private function getSelectedMenu(Collection $allSelectedMenu, $allMenus): array
    {
        $selectedMenu = $allSelectedMenu->toArray();
        $array = [];

        foreach ($selectedMenu as $item) {
            $data = array_column($allMenus[$item['target_type']] ?? [], null, 'id')[$item['target_id']] ?? [];
            if ($data) {
                $array[] = [
                    'id' => $data['id'] ?? null,
                    'title' => $data['title'] ?? null,
                    'type' => $item['target_type'],
                ];
            }
        }
        return $array;
    }
}
