<?php

namespace App\Services\Common\Image;

use App\Data\Repositories\Eloquent\ImageRepository;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CreateImagesService
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
     * CreateImagesService
     *
     * @param Model  $model  Model
     * @param string $images Images
     * @param int    $type   Type
     *
     * @return void
     */
    public function handle (Model $model, $images, int $type = Image::TYPE_NORMAL)
    {
        if ($images) {
            $defaultData = [
                'target_type' => $model->getMorphClass(),
                'target_id' => $model->id,
                'type' => $type,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            $dataInsert = [];

            foreach ($images as $image) {
                $image = json_decode($image, true);

                $defaultData['store_name'] = $image['store_name'];
                $defaultData['origin_name'] = $image['origin_name'];
                $defaultData['size'] = $image['size'];
                $dataInsert[] = $defaultData;
            }
            $this->imageRepository->insert($dataInsert);
        }
    }
}
