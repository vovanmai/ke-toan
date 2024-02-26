<?php

namespace App\Services\Admin\Recruitment;

use App\Data\Repositories\Eloquent\RecruitmentRepository;
use App\Services\Common\Image\DeleteImagesService;

class DeleteService
{
    /**
     * @var RecruitmentRepository
     */
    protected $repository;

    public function __construct(RecruitmentRepository $repository)
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
        $recruitment = $this->repository->find($id);

        $previewImageId = $recruitment->previewImage->id;

        resolve(DeleteImagesService::class)->handle($recruitment, [$previewImageId]);

        $this->repository->delete($id);
    }
}
