<?php

namespace App\Services\Admin\Post;

use App\Data\Repositories\Eloquent\ImageRepository;
use App\Data\Repositories\Eloquent\PostRepository;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Exceptions\ValidatorException;

class StoreService
{
    /**
     * @var PostRepository
     */
    protected $postRepository;

    public function __construct(
        PostRepository $postRepository
    ) {
        $this->postRepository = $postRepository;
    }

    /**
     * Create post
     *
     * @return array
     */
    public function handle (array $data)
    {
        return $this->createPost($data);
    }

    /**
     * Create post
     *
     * @param array $data Data
     *
     * @return Product
     * @throws ValidatorException
     */
    public function createPost (array $data)
    {
        $dataCreate = [
            'title' => $data['title'],
            'short_description' => $data['short_description'] ?? null,
            'admin_id' => Auth::user()->id,
            'category_id' => $data['category_id'],
            'image' => $data['image'],
            'description' => $data['description'],
        ];

        return $this->postRepository->create($dataCreate);
    }
}
