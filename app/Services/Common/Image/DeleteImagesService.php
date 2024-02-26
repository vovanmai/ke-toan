<?php

namespace App\Services\Common\Image;

use App\Data\Repositories\Eloquent\ImageRepository;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DeleteImagesService
{
    /**
     * @var ImageRepository
     */
    protected $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    /**
     * CreateOrUpdateImageService
     *
     * @param Model      $model    Model
     * @param Image|null $oldImage Old image
     * @param Image|null $newImage New image
     *
     * @return void
     */
    public function handle (Model $model, $imageIds)
    {
        if ($imageIds) {
            foreach ($imageIds as $imageId) {
                $image = $this->imageRepository->firstWhere([
                    'target_id' => $model->id,
                    'target_type' => $model->getMorphClass(),
                    'id' => $imageId
                ]);
                if ($image) {
                    if (Storage::delete(getFileContainFolder() . '/' . $image->store_name)) {
                        $image->delete();
                    }
                }
            }
        }
    }
}
