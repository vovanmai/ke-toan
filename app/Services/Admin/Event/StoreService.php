<?php

namespace App\Services\Admin\Event;

use App\Data\Repositories\Eloquent\EventRepository;
use Illuminate\Support\Facades\Auth;

class StoreService
{
    /**
     * @var EventRepository
     */
    protected $repository;

    public function __construct(EventRepository $repository)
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
