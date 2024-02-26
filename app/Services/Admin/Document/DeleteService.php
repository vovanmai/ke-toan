<?php

namespace App\Services\Admin\Document;

use App\Data\Repositories\Eloquent\DocumentRepository;
use App\Services\Common\Image\DeleteImagesService;
use Illuminate\Support\Facades\Storage;

class DeleteService
{
    /**
     * @var DocumentRepository
     */
    protected $repository;

    public function __construct(DocumentRepository $repository)
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
        $item = $this->repository->find($id);

        if ($previewImageName = $item->preview_image['store_name'] ?? null) {
            Storage::delete(getFileContainFolder() . '/' . $previewImageName);
        }

        if ($file = $item->file['store_name'] ?? null) {
            Storage::delete(getFileContainFolder() . '/' . $file);
        }

        $detailImages = $item->detailImages->pluck('id')->toArray();

        resolve(DeleteImagesService::class)->handle($item, $detailImages);

        $this->repository->delete($id);
    }
}
