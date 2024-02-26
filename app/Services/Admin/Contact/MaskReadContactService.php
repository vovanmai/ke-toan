<?php

namespace App\Services\Admin\Contact;

use App\Data\Repositories\Eloquent\ContactRepository;

class MaskReadContactService
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
     *
     * @return boolean
     */
    public function handle ()
    {
        return $this->repository->updateWhere([
            'is_read' => false,
        ], [
            'is_read' => true,
        ]);
    }
}
