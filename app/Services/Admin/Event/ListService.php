<?php

namespace App\Services\Admin\Event;

use App\Data\Repositories\Eloquent\EventRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ListService
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
    public function handle ()
    {
        return $this->repository->search(['admin_id' => Auth::id()])
            ->all([
                'id',
                'title',
                DB::raw("CASE WHEN is_all_day THEN CONCAT(start_date) ELSE CONCAT(start_date, ' ', start_time) END as start"),
                'color as backgroundColor',
                'color as borderColor',
            ]);
    }
}
