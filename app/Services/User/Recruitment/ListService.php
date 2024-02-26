<?php

namespace App\Services\User\Recruitment;

use App\Data\Repositories\Eloquent\RecruitmentRepository;

class ListService
{
    /**
     * @var RecruitmentRepository
     */
    protected $repository;

    public function __construct(RecruitmentRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function handle ()
    {
        return $this->repository->with([
            'admin',
        ])->orderBy('id', 'DESC')
            ->whereByField('active', true)
            ->paginate(5);
    }
}
