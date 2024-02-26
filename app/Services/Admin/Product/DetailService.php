<?php

namespace App\Services\Admin\Product;

use App\Data\Repositories\Eloquent\ProductRepository;

class DetailService
{
    /**
     * @var ProductRepository
     */
    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id $id Id
     *
     * @return array
     */
    public function handle (int $id)
    {
        return $this->repository->with([
            'category',
            'previewImage' => function($query) {
                return $query->select([
                    'id',
                    'target_id',
                    'store_name',
                    'origin_name as name',
                    'size',
                ]);
            },
            'detailImages' => function($query) {
                return $query->select([
                    'id',
                    'target_id',
                    'store_name',
                    'origin_name as name',
                    'size',
                ]);
            },
        ])->find($id);
    }
}
