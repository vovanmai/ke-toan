<?php

namespace App\Services\Admin\Post;

use App\Data\Repositories\Eloquent\PostRepository;
use App\Services\Common\Image\DeleteImagesService;
use Illuminate\Support\Facades\Storage;

class DeleteService
{
    /**
     * @var PostRepository
     */
    protected $repository;

    public function __construct(PostRepository $repository)
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
        $post = $this->repository->find($id);

        if ($fileName = $post->image['store_name']) {
            Storage::delete(getFileContainFolder() . '/' . $fileName);
        }

        $this->repository->delete($id);
    }
}
