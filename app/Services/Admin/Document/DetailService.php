<?php

namespace App\Services\Admin\Document;

use App\Data\Repositories\Eloquent\DocumentRepository;

class DetailService
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
     * @param $id $id Id
     *
     * @return array
     */
    public function handle (int $id)
    {
        return $this->repository->with([
            'category',
        ])->find($id);
    }
}
