<?php

namespace App\Services\Common\Image;

use App\Data\Repositories\Eloquent\ImageRepository;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CreateOrUpdateImageService
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
    public function handle (Model $model, $newImage, $oldImage = null, int $type = Image::TYPE_NORMAL)
    {
        if ($newImage) {
            $newImage = json_decode($newImage, true);

            if ($oldImage) {
                Storage::delete(getFileContainFolder() . '/' . $oldImage->store_name);
            }

            return $this->imageRepository->updateOrCreate([
                'target_type' => $model->getMorphClass(),
                'target_id' => $model->id,
                'type' => $type,
            ], [
                'store_name' => $newImage['store_name'],
                'origin_name' => $newImage['origin_name'],
                'size' => $newImage['size'],
            ]);
        }
    }
}
