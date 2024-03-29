<?php

namespace App\Services\Admin\SupportAndConsultation;

use App\Data\Repositories\Eloquent\SupportAndConsultationRepository;
use Carbon\Carbon;

class ListService
{

    /**
     * @var SupportAndConsultationRepository
     */
    protected $repository;

    public function __construct(SupportAndConsultationRepository $repository)
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
        $filters = $this->updateFilters($filters);

        return $this->repository->search($filters)
            ->orderByColumns([
                'id' => 'DESC',
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
        if (isset($filters['is_read'])) {
            $filters['is_read'] = false;
        }

        if (isset($filters['created_at_from'])) {
            $filters['created_at_from'] = Carbon::parse($filters['created_at_from']);
        }

        if (isset($filters['created_at_to'])) {
            $filters['created_at_to'] = Carbon::parse($filters['created_at_to']);
        }

        return $filters;
    }
}
