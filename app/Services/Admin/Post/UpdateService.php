<?php

namespace App\Services\Admin\Post;

use App\Data\Repositories\Eloquent\ImageRepository;
use App\Data\Repositories\Eloquent\PostRepository;
use App\Models\Image;
use App\Models\Post;
use App\Models\Product;
use App\Services\Admin\Traits\RemoveFileTrait;
use App\Services\Common\Image\CreateOrUpdateImageService;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateService
{
    use RemoveFileTrait;

    /**
     * @var PostRepository
     */
    protected $postRepository;

    /**
     * @var ImageRepository
     */
    protected $imageRepository;

    public function __construct(
        PostRepository $postRepository,
        ImageRepository $imageRepository
    ) {
        $this->postRepository = $postRepository;
        $this->imageRepository = $imageRepository;
    }

    /**
     * Update product
     *
     * @return array
     */
    public function handle (int $id, array $data)
    {
        $item = $this->postRepository->find($id);

        if ($data['image'] ?? null) {
            $this->removeFile($item->image['store_name'] ?? null);
        }

        return $this->updatePost($id, $data);
    }

    /**
     * Create post
     *
     * @param array $data Data
     *
     * @return Product
     * @throws ValidatorException
     */
    public function updatePost (int $id, array $data)
    {
        $dataUpdate = [
            'title' => $data['title'],
            'short_description' => $data['short_description'] ?? null,
            'category_id' => $data['category_id'],
            'description' => $data['description'],
            'active' => $data['active'] ?? false,
        ];

        if (isset($data['image']) && !empty($data['image'])) {
            $dataUpdate['image'] = $data['image'];
        }

        return $this->postRepository->update($dataUpdate, $id);
    }
}
