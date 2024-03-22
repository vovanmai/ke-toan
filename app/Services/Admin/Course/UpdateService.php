<?php

namespace App\Services\Admin\Course;

use App\Data\Repositories\Eloquent\CourseRepository;
use App\Services\Admin\Traits\RemoveFileTrait;

class UpdateService
{
    use RemoveFileTrait;

    /**
     * @var CourseRepository
     */
    protected $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create website setting
     *
     * @return array
     */
    public function handle (int $id, array $data)
    {
        $item = $this->repository->find($id);

        if ($data['image'] ?? null) {
            $this->removeFile($item->image['store_name'] ?? null);
        } else {
            unset($data['image']);
        }

        return $this->repository->update($data, $id);
    }
}
