<?php

namespace App\Services\Admin\Page;

use App\Data\Repositories\Eloquent\PageRepository;

class DeleteService
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
    public function handle (int $id)
    {
        $this->repository->find($id);

        $this->repository->delete($id);
    }
}
