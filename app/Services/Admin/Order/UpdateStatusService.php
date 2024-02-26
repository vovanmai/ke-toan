<?php

namespace App\Services\Admin\Order;

use App\Data\Repositories\Eloquent\OrderRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UpdateStatusService
{
    /**
     * @var OrderRepository
     */
    protected $repository;

    public function __construct(
        OrderRepository $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * @param $id $id Id
     *
     * @return array
     */
    public function handle (int $id, array $data)
    {
        $order = $this->repository->find($id);

        $order = $this->repository->update($data, $order->id);

        $admin = Auth::user();

        $order->orderHistories()->create([
            'status' => $data['status'],
            'updatable_type' => $admin->getMorphClass(),
            'updatable_id' => $admin->id,
            'note' => $data['note'] ?? null,
            'changed_at' => now(),
        ]);

        return $order;
    }
}
