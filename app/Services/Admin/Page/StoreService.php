<?php

namespace App\Services\Admin\Page;

use App\Data\Repositories\Eloquent\ImageRepository;
use App\Data\Repositories\Eloquent\PageRepository;
use App\Data\Repositories\Eloquent\PostRepository;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Exceptions\ValidatorException;

class StoreService
{
    /**
     * @var PostRepository
     */
    protected $repository;

    public function __construct(
        PageRepository $repository
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
            'short_description' => $data['short_description'] ?? null,
            'admin_id' => Auth::user()->id,
            'description' => $data['description'],
        ];

        return $this->repository->create($dataCreate);
    }
}
