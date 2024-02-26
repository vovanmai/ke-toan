<?php

namespace App\Services\Admin\Product;

use App\Data\Repositories\Eloquent\ProductRepository;
use App\Services\Common\Image\DeleteImagesService;

class DeleteService
{
    /**
     * @var ProductRepository
     */
    protected $repository;

    public function __construct(ProductRepository $repository)
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
        $product = $this->repository->find($id);

        $previewImageId = $product->previewImage->id;

        resolve(DeleteImagesService::class)->handle($product, [$previewImageId]);

        $detailImageIds = $product->detailImages->pluck('id')->toArray();

        resolve(DeleteImagesService::class)->handle($product, $detailImageIds);

        $this->repository->delete($id);
    }
}
