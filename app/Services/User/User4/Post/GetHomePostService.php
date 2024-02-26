<?php


namespace App\Services\User\User4\Post;

use App\Data\Repositories\Eloquent\PostRepository;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class GetHomePostService
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
    public function handle()
    {
        $post = $this->repository->whereByField('is_show_home', true)
            ->whereByField('active', true)
            ->orderBy('created_at', 'DESC')
            ->first();

        if ($post) {
            makeSEO([
                'title' => $post->title,
                'description' => $post->short_description,
                'image' => $post->image['url'],
            ]);


            $this->increaseViewCount($post);
        }


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
