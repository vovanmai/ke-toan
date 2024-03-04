<?php

namespace App\Services\User\Post;

use App\Data\Repositories\Eloquent\PostRepository;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;


class DetailService
{
    /**
     * @var PostRepository
     */
    protected $repository;

    public function __construct(PostRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function handle ($slug)
    {
        $post = $this->repository->with([
            'admin',
        ])->firstOrFailWhere([
            'slug' => $slug,
            'active' => true,
        ]);

        $this->increaseViewCount($post);

        return $post;
    }

    /**
     * Increase view count of post
     *
     * @return void
     */
    public function increaseViewCount(Post $post)
    {
        $ip = request()->ip();

        $lock = Cache::lock("post_{$ip}_{$post->id}", 60);

        if ($lock->get()) {
            $post->total_view++;

            $post->save();
        }
    }
}
