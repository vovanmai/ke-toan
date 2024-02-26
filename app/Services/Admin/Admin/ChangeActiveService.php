<?php

namespace App\Services\Admin\Admin;

use App\Data\Exceptions\ForbiddenException;
use App\Data\Repositories\Eloquent\AdminRepository;
use App\Services\Admin\CommonService;

class ChangeActiveService
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
     * @param int $id Id
     *
     * @return boolean
     */
    public function handle (int $id, array $data)
    {
        $item = $this->repository->find($id);

        if ($item->id == auth()->id()) {
            throw new ForbiddenException('Bạn không thể thay đổi trạng thái của chính mình.');
        }

        $roles = array_keys(resolve(CommonService::class)->getRoles());

        if (!in_array($item->role, $roles)) {
            throw new ForbiddenException('Bạn không có quyền.');
        }

        return $this->repository->update([
            'active' => $data['active'],
        ], $item->id);
    }
}
