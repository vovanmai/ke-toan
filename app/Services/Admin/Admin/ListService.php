<?php

namespace App\Services\Admin\Admin;

use App\Data\Repositories\Eloquent\AdminRepository;
use App\Services\Admin\CommonService;
use Illuminate\Support\Collection;

class ListService
{
    /**
     * @var AdminRepository
     */
    protected $repository;

    public function __construct(AdminRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $filters Filters
     *
     * @return Collection
     */
    public function handle (array $filters)
    {
        return $this->repository->search($filters)
            ->orderByColumns([
                'id' => 'desc',
            ])
            ->paginate(15, [
                'id',
                'role',
                'name',
                'email',
                'avatar',
                'active',
                'login_at',
                'created_at',
                'updated_at',
            ]);
    }
}
