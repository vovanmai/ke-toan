<?php

namespace App\Services\Admin\CourseImage;

use App\Data\Repositories\Eloquent\CourseImageRepository;
use App\Services\Admin\Traits\RemoveFileTrait;
use Illuminate\Support\Facades\Storage;

class DeleteService
{
    use RemoveFileTrait;

    /**
     * @var CourseImageRepository
     */
    protected $repository;

    public function __construct(CourseImageRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $filters Filters
     *
     * @return
     */
    public function handle (int $id)
    {
        $item = $this->repository->find($id);

        if ($fileName = $item->image['store_name'] ?? null) {
            $this->removeFile($fileName);
        }


        return $item->delete();
    }
}
