<?php

namespace App\Services\User\User1\Recruitment;

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
            'previewImage',
            'admin',
        ])->orderBy('id', 'DESC')
            ->paginate(100);
    }
}
