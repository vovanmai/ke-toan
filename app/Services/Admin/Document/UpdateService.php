<?php

namespace App\Services\Admin\Document;

use App\Data\Repositories\Eloquent\DocumentRepository;
use App\Data\Repositories\Eloquent\ImageRepository;
use App\Services\Common\Image\CreateImagesService;
use App\Services\Common\Image\DeleteImagesService;
use Illuminate\Support\Facades\Storage;

class UpdateService
{
    /**
     * @var DocumentRepository
     */
    protected $repository;

    /**
     * @var DocumentRepository
     */
    protected $imageRepository;

    public function __construct(
        DocumentRepository $repository,
        ImageRepository $imageRepository
    ) {
        $this->repository = $repository;
        $this->imageRepository = $imageRepository;
    }

    /**
     * Update product
     *
     * @return array
     */
    public function handle (int $id, array $data)
    {
        $document = $this->repository->find($id);

        $dataUpdate = [
            'title' => $data['title'],
            'short_description' => $data['short_description'],
            'category_id' => $data['category_id'],
            'description' => $data['description'],
            'comment_type' => $data['comment_type'],
            'total_page' => $data['total_page'],
            'is_free' => isset($data['is_free']),
            'price' => !isset($data['is_free']) ? $data['price'] : null,
        ];

        if (isset($data['preview_file'])) {
            if (Storage::exists(getFileContainFolder() . '/' . $document->preview_image['store_name'])) {
                Storage::delete(getFileContainFolder() . '/' . $document->preview_image['store_name']);
            }
            $dataUpdate['preview_file'] = $data['preview_file'];
        }

        if (isset($data['file'])) {
            if (Storage::exists(getFileContainFolder() . '/' . $document->file['store_name'])) {
                Storage::delete(getFileContainFolder() . '/' . $document->file['store_name']);
            }
            $dataUpdate['file'] = $data['file'];
        }

        return $this->repository->update($dataUpdate, $id);
    }
}
