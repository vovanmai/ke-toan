<?php

namespace App\Services\Admin\Page;

use App\Data\Repositories\Eloquent\PageRepository;

class DetailService
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
     * @param $id $id Id
     *
     * @return array
     */
    public function handle (int $id)
    {
        return $this->repository->find($id);
    }
}
