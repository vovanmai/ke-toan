<?php

namespace App\Services\Admin\SettingMainMenu;

use App\Data\Repositories\Eloquent\CategoryRepository;
use App\Data\Repositories\Eloquent\MainMenuSettingRepository;
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
                'id' => null,
                'title' => 'Khóa học kế toán',
                'type' => 'course',
            ]
        ];

        $pages = $this->pageRepo->whereByField('active', true)
            ->orderBy('id', 'ASC')
            ->all(['id', 'title', DB::raw("'page' as type"), DB::raw('null as children_recursive')])
            ->toArray();

        $categories = $this->catRepo
            ->whereByField('active', true)
            ->whereNull('parent_id')
            ->whereByField('type', Category::TYPE_POST)
            ->orderBy('id', 'ASC')
            ->all(['id', 'title', DB::raw("'post' as type")])
            ->toArray();

        $data = array_merge($data, $categories, $pages);

        $allSelectedMenu = collect(app('web_setting')->main_menu ?? [])->groupBy('type')->toArray();

        return [
            'availableMenu' => $this->getAvailableMenu($data, $allSelectedMenu),
        ];
    }

    private function getAvailableMenu(array $data, array $selectedMenu): array
    {
        $availableMenu = [];
        foreach ($data as $key => $item) {
            $ids = collect($selectedMenu[$item['type']] ?? [])->pluck('id')->toArray();
            if (!in_array($item['id'], $ids)) {
                $availableMenu[] = $item;
            }
        }
        return $availableMenu;
    }
}
