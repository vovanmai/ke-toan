<?php

namespace App\Services\Admin\Page;

use App\Data\Repositories\Eloquent\PageRepository;

class ChangeShowOnMenuService
{
    /**
     * @var PageRepository
     */
    protected $repository;

    public function __construct(PageRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id Id
     *
     * @return array
     */
    public function handle (int $id, array $data)
    {
        $page = $this->repository->find($id);

        return $this->repository->update(['show_on_menu' => $data['show_on_menu']], $page->id);
    }
}
