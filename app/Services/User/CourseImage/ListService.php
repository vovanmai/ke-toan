<?php

namespace App\Services\User\CourseImage;

use App\Data\Repositories\Eloquent\CourseImageRepository;

class ListService
{
    /**
     * @var CourseImageRepository
     */
    protected $repository;

    public function __construct(CourseImageRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return
     */
    public function handle ()
    {
        return $this->repository
            ->orderByColumns([
                'id' => 'DESC',
            ])
            ->paginate(18);
    }
}
