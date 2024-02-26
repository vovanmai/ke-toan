<?php

namespace App\Services\Admin\Recruitment;

use App\Data\Repositories\Eloquent\RecruitmentRepository;

class ChangeActiveService
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
     * Change active
     *
     * @param int   $id   Id
     * @param array $data Data
     *
     * @return boolean
     */
    public function handle (int $id, array $data)
    {
        $item = $this->repository->find($id);

        return $this->repository->update([
            'active' => $data['active'],
        ], $item->id);
    }
}
