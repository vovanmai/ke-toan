<?php

namespace App\Services\Admin\Order;

use App\Data\Repositories\Eloquent\OrderRepository;

class ChangeActiveService
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
     * @param int $id Id
     *
     * @return boolean
     */
    public function handle (int $id, array $data)
    {
        $comment = $this->repository->find($id);

        return $this->repository->update([
            'active' => $data['active'],
        ], $comment->id);
    }
}
