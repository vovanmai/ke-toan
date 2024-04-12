<?php

namespace App\Services\Admin\Post;

use App\Data\Repositories\Eloquent\PostRepository;
use App\Models\Product;
use App\Services\Admin\Traits\RemoveFileTrait;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateService
{
    use RemoveFileTrait;

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
     * Update product
     *
     * @return array
     */
    public function handle (int $id, array $data)
    {
        $item = $this->postRepository->find($id);

        if ($data['image'] ?? null) {
            $this->removeFile($item->image['store_name'] ?? null);
        } else {
            unset($data['image']);
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
