<?php

namespace App\Services\Admin\Contact;

use App\Data\Repositories\Eloquent\ContactRepository;

class CountUnreadService
{
    /**
     * @var ContactRepository
     */
    protected $repository;

    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id Id
     *
     * @return boolean
     */
    public function handle ()
    {
        return $this->repository->count([
            'is_read' => false,
        ], ['id']);
    }
}
