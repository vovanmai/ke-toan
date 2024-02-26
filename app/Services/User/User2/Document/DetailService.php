<?php

namespace App\Services\User\User2\Document;

use App\Data\Repositories\Eloquent\DocumentRepository;
use App\Models\Document;
use Illuminate\Support\Facades\Cache;


class DetailService
{
    /**
     * @var DocumentRepository
     */
    protected $repository;

    public function __construct(DocumentRepository $repository) {
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
     * Increase view count of document
     *
     * @return void
     */
    public function increaseViewCount(Document $post)
    {
        $ip = request()->ip();

        $lock = Cache::lock("document_{$ip}_{$post->id}", 60);

        if ($lock->get()) {
            $post->total_view++;

            $post->save();
        }
    }
}
