<?php

namespace App\Services\User\Post;

use App\Data\Repositories\Eloquent\CategoryRepository;
use App\Data\Repositories\Eloquent\PostRepository;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class DetailService
{
    /**
     * @var PostRepository
     */
    protected $repository;

    /**
     * @var CategoryRepository
     */
    protected $catRepo;

    public function __construct(
        PostRepository $repository,
        CategoryRepository $catRepo
    ) {
        $this->repository = $repository;
        $this->catRepo = $catRepo;
    }

    /**
     * @return array
     */
    public function handle (string $cat, string $slug)
    {
        $this->catRepo->firstOrFailWhere([
            'slug' => $cat,
            'active' => true,
        ], ['id']);

        $post = $this->repository->with([
            'admin',
            'category' => function ($query) {
                $query->with(['parentRecursive']);
            },
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
            DB::table('posts')->where('id', $post->id)->update([
                'total_view' => DB::raw('total_view + 1'),
            ]);
        }
    }
}
