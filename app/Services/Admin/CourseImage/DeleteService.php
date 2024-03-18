<?php

namespace App\Services\Admin\CourseImage;

use App\Data\Repositories\Eloquent\CourseImageRepository;
use Illuminate\Support\Facades\Storage;

class DeleteService
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
     * @param array $filters Filters
     *
     * @return
     */
    public function handle (int $id)
    {

        $image = $this->repository->find($id);
        Storage::delete(getFileContainFolder() . '/' . $image->image['store_name']);

        return $image->delete();
    }
}
