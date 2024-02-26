<?php

namespace App\Services\User\User3\Contact;

use App\Data\Repositories\Eloquent\ContactRepository;

class StoreService
{
    /**
     * @var ContactRepository
     */
    protected $repository;

    public function __construct(ContactRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @param array $data Data
     *
     * @return array
     */
    public function handle (array $data)
    {
        $data['is_read'] = false;
        return $this->repository->create($data);
    }
}
