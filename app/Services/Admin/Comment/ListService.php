<?php

namespace App\Services\Admin\Comment;

use App\Data\Repositories\Eloquent\CommentRepository;
use Carbon\Carbon;

class ListService
{
    /**
     * @var CommentRepository
     */
    protected $repository;

    public function __construct(CommentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $filters Filters
     *
     * @return
     */
    public function handle (array $filters)
    {
        $unRead = isset($filters['un_read']) && !empty($filters['un_read']);
        $filters = $this->updateFilters($filters);

        return $this->repository->search($filters)
            ->scopeQuery(function ($query) use ($unRead) {
                if ($unRead) {
                    return $query->where('is_read', false);
                }
                return $query;
            })
            ->with([
                'user',
                'admin',
                'target',
            ])
            ->orderByColumns([
                'id' => 'desc',
            ])
            ->paginate(10);
    }

    /**
     * Update filters
     *
     * @param array $filters Filters
     *
     * @return array
     */
    private function updateFilters (array $filters)
    {
        if (isset($filters['created_at_from'])) {
            $filters['created_at_from'] = Carbon::parse($filters['created_at_from']);

        }

        if (isset($filters['created_at_to'])) {
            $filters['created_at_to'] = Carbon::parse($filters['created_at_to']);
        }

        unset($filters['un_read']);

        return $filters;
    }
}
