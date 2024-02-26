<?php

namespace App\Services\Admin\Post;

use App\Data\Repositories\Eloquent\PostRepository;

class ChangeActiveService
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
    public function handle (int $id, array $data)
    {
        $post = $this->repository->find($id);

        return $this->repository->update(['active' => $data['active']], $post->id);
    }
}
