<?php

namespace App\Services\Admin\Course;

use App\Data\Repositories\Eloquent\CourseRepository;

class ChangeActiveService
{

    /**
     * @var CourseRepository
     */
    protected $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id Id
     *
     * @return boolean
     */
    public function handle (int $id, array $data)
    {
        $comment = $this->repository->find($id);

        return $this->repository->update([
            'active' => $data['active'],
        ], $comment->id);
    }
}
