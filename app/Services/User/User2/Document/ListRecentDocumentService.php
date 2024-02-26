<?php

namespace App\Services\User\User2\Document;

use App\Data\Repositories\Eloquent\DocumentRepository;

class ListRecentDocumentService
{
    /**
     * @var DocumentRepository
     */
    protected $repository;

    public function __construct(DocumentRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function handle ()
    {
        return $this->repository->whereByField('active', true)
            ->orderBy('created_at', 'DESC')
            ->orderBy('id', 'DESC')
            ->limit(20);
    }
}
