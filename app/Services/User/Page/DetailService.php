<?php

namespace App\Services\User\Page;

use App\Data\Repositories\Eloquent\PageRepository;
use App\Data\Repositories\Eloquent\PostRepository;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class DetailService
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
     * Get comments
     *
     * @param array $data Data
     *
     */
    public function handle (string $slug)
    {
        $page = $this->repository->firstOrFailWhere([
            'slug' => $slug,
            'active' => true,
        ]);

        $this->increaseViewCount($page);

        return $page;
    }

    /**
     * Increase view count of post
     *
     * @return void
     */
    public function increaseViewCount(Page $page)
    {
        $ip = request()->ip();

        $lock = Cache::lock("page_{$ip}_{$page->id}", 30);

        if ($lock->get()) {
            $page->total_view++;

            $page->save();
        }
    }
}
