<?php

namespace App\Services\User\User4\Recruitment;

use App\Data\Repositories\Eloquent\RecruitmentRepository;

class ListRelatedRecruitmentService
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
    public function handle ($notSlug)
    {
        return $this->repository->with([
            'admin',
        ])
            ->whereByField('slug', $notSlug, '!=')
            ->orderBy('id', 'DESC')
            ->limit(3);
    }
}
