<?php

namespace App\Services\Admin\Page;

use App\Data\Repositories\Eloquent\PageRepository;

class UpdateService
{
    /**
     * @var PageRepository
     */
    protected $repository;

    public function __construct(
        PageRepository $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * Update product
     *
     * @return array
     */
    public function handle (int $id, array $data)
    {
        $dataUpdate = [
            'title' => $data['title'],
            'short_description' => $data['short_description'] ?? null,
            'description' => $data['description'],
            'admin_id' => auth()->id(),
        ];

        return $this->repository->update($dataUpdate, $id);
    }
}
