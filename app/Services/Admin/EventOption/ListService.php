<?php

namespace App\Services\Admin\EventOption;

use App\Data\Repositories\Eloquent\EventOptionRepository;
use Illuminate\Support\Facades\Auth;

class ListService
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
    public function handle ()
    {
        return $this->repository->scopeQuery(function ($query) {
            return $query->whereNull('admin_id')->orWhere('admin_id', Auth::id());
        })->orderBy('id', 'DESC')
            ->all();
    }
}
