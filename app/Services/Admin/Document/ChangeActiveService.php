<?php

namespace App\Services\Admin\Document;

use App\Data\Repositories\Eloquent\DocumentRepository;

class ChangeActiveService
{
    /**
     * @var DocumentRepository
     */
    protected $repository;

    public function __construct(DocumentRepository $repository)
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
