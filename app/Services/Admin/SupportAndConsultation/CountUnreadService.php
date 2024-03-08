<?php

namespace App\Services\Admin\SupportAndConsultation;

use App\Data\Repositories\Eloquent\SupportAndConsultationRepository;

class CountUnreadService
{
    /**
     * @var SupportAndConsultationRepository
     */
    protected $repository;

    public function __construct(SupportAndConsultationRepository $repository)
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
