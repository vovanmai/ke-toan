<?php

namespace App\Services\Admin\Product;

use App\Data\Repositories\Eloquent\ImageRepository;
use App\Data\Repositories\Eloquent\ProductRepository;
use App\Models\Image;
use App\Models\Product;
use App\Services\Common\Image\CreateImagesService;
use App\Services\Common\Image\CreateOrUpdateImageService;
use App\Services\Common\Image\DeleteImagesService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateService
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var ImageRepository
     */
    protected $imageRepository;

    public function __construct(
        ProductRepository $productRepository,
        ImageRepository $imageRepository
    ) {
        $this->productRepository = $productRepository;
        $this->imageRepository = $imageRepository;
    }

    /**
     * Update product
     *
     * @return array
     */
    public function handle (int $id, array $data)
    {
        $product = $this->updateProduct($id, $data);

        $this->updatePreviewImage($product, $product->previewImage, $data['preview_image'] ?? null);

        $this->updateDetailImages($product, $data['detail_images'] ?? []);

        // Remove detail images
        $this->removeImages($product, $data['remove_detail_image_ids'] ?? []);
    }

    /**
     * Create product
     *
     * @param array $data Data
     *
     * @return Product
     * @throws ValidatorException
     */
    public function updateProduct (int $id, array $data)
    {
        return $this->productRepository->update([
            'name' => $data['name'],
            'quantity' => $data['quantity'],
            'admin_id' => Auth::user()->id,
            'category_id' => $data['category_id'],
            'price' => $data['price'],
            'description' => $data['description']
        ], $id);
    }

    /**
     * updatePreviewImage
     *
     * @param Product $product Product
     * @param string   $images  Images
     *
     * @return void
     */
    public function updatePreviewImage (Product $product, $oldImage, $newImage)
    {
        resolve(CreateOrUpdateImageService::class)->handle($product, $newImage, $oldImage, Image::TYPE_PREVIEW);
    }

    /**
     * Create product
     *
     * @param Product $product Product
     * @param array   $images  Images
     *
     * @return void
     */
    public function updateDetailImages (Product $product, $images)
    {
        resolve(CreateImagesService::class)->handle($product, $images);
    }

    /**
     * removeImages
     *
     * @param Product $product Product
     * @param array   $images  Images
     *
     * @return void
     */
    public function removeImages (Product $product, $images)
    {
        resolve(DeleteImagesService::class)->handle($product, $images);
    }
}
