<?php

namespace App\Services\Admin\Recruitment;

use App\Data\Repositories\Eloquent\RecruitmentRepository;

class DetailService
{
    /**
     * @var RecruitmentRepository
     */
    protected $repository;

    public function __construct(RecruitmentRepository $repository)
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
        return $this->repository->find($id);
    }
}
