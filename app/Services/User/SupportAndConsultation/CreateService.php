<?php

namespace App\Services\User\SupportAndConsultation;

use App\Data\Repositories\Eloquent\SupportAndConsultationRepository;

class CreateService
{
    /**
     * @var SupportAndConsultationRepository
     */
    protected $repository;

    public function __construct(
        SupportAndConsultationRepository $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * Create
     *
     * @param array $data Data
     *
     */
    public function handle (array $data)
    {
        return $this->repository->create($data);
    }
}
