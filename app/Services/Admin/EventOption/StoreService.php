<?php

namespace App\Services\Admin\EventOption;

use App\Data\Repositories\Eloquent\EventOptionRepository;
use Illuminate\Support\Facades\Auth;

class StoreService
{
    /**
     * @var EventOptionRepository
     */
    protected $repository;

    public function __construct(EventOptionRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * List event options
     *
     * @return array
     */
    public function handle(array $data)
    {
        $data['admin_id'] = Auth::id();

        return $this->repository->create($data);
    }
}
