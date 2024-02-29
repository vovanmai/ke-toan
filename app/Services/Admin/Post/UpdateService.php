<?php

namespace App\Services\Admin\Post;

use App\Data\Repositories\Eloquent\ImageRepository;
use App\Data\Repositories\Eloquent\PostRepository;
use App\Models\Image;
use App\Models\Post;
use App\Models\Product;
use App\Services\Common\Image\CreateImagesService;
use App\Services\Common\Image\CreateOrUpdateImageService;
use App\Services\Common\Image\DeleteImagesService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateService
{
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
        ];

        if (isset($data['image']) && !empty($data['image'])) {
            $dataUpdate['image'] = $data['image'];
        }

        return $this->postRepository->update($dataUpdate, $id);
    }

    /**
     * updatePreviewImage
     *
     * @param Post   $post   Post
     * @param string $images Images
     *
     * @return void
     */
    public function updatePreviewImage (Post $post, $oldImage, $newImage)
    {
        resolve(CreateOrUpdateImageService::class)->handle($post, $newImage, $oldImage, Image::TYPE_PREVIEW);
    }
}
