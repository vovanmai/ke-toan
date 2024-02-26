<?php

namespace App\Services\Admin\Product;

use App\Data\Repositories\Eloquent\ImageRepository;
use App\Data\Repositories\Eloquent\ProductRepository;
use App\Models\Image;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Prettus\Validator\Exceptions\ValidatorException;
use Ramsey\Uuid\Uuid;

class StoreService
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
     * Create product
     *
     * @return array
     */
    public function handle (array $data)
    {
        $product = $this->createProduct($data);

        $this->createPreviewImage($product, $data['preview_image']);

        $this->createDetailImages($product, $data['detail_images']);
    }

    /**
     * Create product
     *
     * @param array $data Data
     *
     * @return Product
     * @throws ValidatorException
     */
    public function createProduct (array $data)
    {
        $dataCreate = [
            'name' => $data['name'],
            'quantity' => $data['quantity'],
            'admin_id' => Auth::user()->id,
            'category_id' => $data['category_id'],
            'price' => $data['price'],
            'description' => $data['description'],
        ];

        return $this->productRepository->create($dataCreate);
    }

    /**
     * Create product
     *
     * @param Product $product Product
     * @param string   $images  Images
     *
     * @return void
     */
    public function createPreviewImage (Product $product, string $image)
    {
        $image = json_decode($image, true);

        $this->imageRepository->create([
            'target_type' => $product->getMorphClass(),
            'target_id' => $product->id,
            'type' => Image::TYPE_PREVIEW,
            'store_name' => $image['store_name'],
            'origin_name' => $image['origin_name'],
            'size' => $image['size'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    /**
     * Create product
     *
     * @param Product $product Product
     * @param array   $images  Images
     *
     * @return void
     */
    public function createDetailImages (Product $product, array $images)
    {
        $defaultData = [
            'target_type' => $product->getMorphClass(),
            'target_id' => $product->id,
            'type' => Image::TYPE_NORMAL,
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
