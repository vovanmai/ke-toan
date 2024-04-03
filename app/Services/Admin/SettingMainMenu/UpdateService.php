<?php

namespace App\Services\Admin\SettingMainMenu;

use App\Data\Repositories\Eloquent\CategoryRepository;
use App\Data\Repositories\Eloquent\PageRepository;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class UpdateService
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
    public function handle (array $data)
    {
        dd($data);
    }
}
