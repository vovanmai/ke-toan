<?php

namespace App\Services\Admin\Document;

use App\Data\Repositories\Eloquent\DocumentRepository;
use App\Services\Common\Image\CreateImagesService;
use Illuminate\Support\Facades\Auth;

class StoreService
{
    /**
     * @var DocumentRepository
     */
    protected $repository;

    public function __construct(
        DocumentRepository $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * Create post
     *
     * @return array
     */
    public function handle (array $data)
    {
        $dataCreate = [
            'title' => $data['title'],
            'short_description' => $data['short_description'],
            'admin_id' => Auth::user()->id,
            'category_id' => $data['category_id'],
            'preview_file' => $data['preview_file'] ?? null,
            'description' => $data['description'],
            'file' => $data['file'],
            'comment_type' => $data['comment_type'],
            'total_page' => $data['total_page'],
            'is_free' => isset($data['is_free']),
            'price' => !isset($data['is_free']) ? $data['price'] : null,
        ];

        return $this->repository->create($dataCreate);
    }
}
