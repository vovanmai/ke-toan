<?php

namespace App\Services\Admin\Course;

use App\Data\Repositories\Eloquent\CourseRepository;
use App\Services\Admin\Traits\RemoveFileTrait;
use Illuminate\Support\Facades\Storage;

class DeleteService
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
     * @param int $id Id
     *
     * @return array
     */
    public function handle (int $id)
    {
        $item = $this->repository->find($id);

        if ($fileName = $item->image['store_name'] ?? null) {
            $this->removeFile($fileName);
        }

        $this->repository->delete($item->id);
    }
}
