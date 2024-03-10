<?php

namespace App\Services\Admin\Order;

use App\Data\Repositories\Eloquent\OrderRepository;
use App\Data\Repositories\Eloquent\MainBannerRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;

class ListService
{

    /**
     * @var OrderRepository
     */
    protected $repository;

    public function __construct(OrderRepository $repository)
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
                'created_at' => 'desc',
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

        return $filters;
    }
}
