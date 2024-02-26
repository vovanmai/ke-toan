<?php

namespace App\Services\User\User1\Recruitment;

use App\Data\Repositories\Eloquent\RecruitmentRepository;

class DetailService
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
    public function handle ($slug)
    {
        return $this->repository->with([
            'previewImage',
            'admin',
        ])->firstOrFailWhere([
            'slug' => $slug
        ]);
    }
}
