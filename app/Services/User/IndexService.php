<?php

namespace App\Services\User;

use App\Data\Repositories\Eloquent\CategoryRepository;
use App\Data\Repositories\Eloquent\PostRepository;
use Illuminate\Support\Facades\DB;


class IndexService
{
    /**
     * @var CategoryRepository
     */
    protected $catRepo;

    /**
     * @var PostRepository
     */
    protected $repository;

    public function __construct(
        CategoryRepository $catRepo,
        PostRepository $repository
    ) {
        $this->repository = $repository;
        $this->catRepo = $catRepo;
    }

    /**
     * @return array
     */
    public function handle ()
    {
        $categories = $this->catRepo
            ->with([
                'activePosts' => function ($query) {
                    return $query->orderBy('id', 'DESC')
                        ->select([
                            'id',
                            'category_id',
                            'slug',
                            'title',
                            'short_description',
                            'image',
                    ])->limit(5);
                }
            ])
            ->scopeQuery(function ($query) {
                return $query->where(function ($query) {
                    $query->whereNull('parent_id')
                        ->whereNotExists(function ($query) {
                            $query->select(DB::raw(1))
                                ->from('categories as cats')
                                ->whereColumn('categories.id', 'cats.parent_id');
                        })
                        ->orWhereNotNull('parent_id');
                });
            })
            ->whereHas('activePosts', function ($query) {
                return $query;
            })
            ->orderBy('id', 'ASC')
            ->all();
//        dd($categories->toArray());
        return [
            'categories' => $categories
        ];
    }
}
