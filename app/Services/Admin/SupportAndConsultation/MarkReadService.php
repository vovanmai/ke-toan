<?php

namespace App\Services\Admin\SupportAndConsultation;

use App\Data\Repositories\Eloquent\SupportAndConsultationRepository;

class MarkReadService
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
