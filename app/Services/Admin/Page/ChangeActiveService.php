<?php

namespace App\Services\Admin\Page;

use App\Data\Repositories\Eloquent\PageRepository;

class ChangeActiveService
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
        $post = $this->repository->find($id);

        return $this->repository->update(['active' => $data['active']], $post->id);
    }
}
