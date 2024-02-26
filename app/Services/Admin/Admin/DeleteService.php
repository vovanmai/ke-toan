<?php

namespace App\Services\Admin\Admin;

use App\Data\Exceptions\ForbiddenException;
use App\Data\Repositories\Eloquent\AdminRepository;
use App\Services\Admin\CommonService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DeleteService
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
     * @return void
     */
    public function handle (int $id)
    {
        $admin = $this->repository->find($id);
        $user = Auth::user();

        $roles = array_keys(resolve(CommonService::class)->getRoles());

        if ($admin->id === $user->id) {
            throw new ForbiddenException('Bạn không thể xóa chính bạn.');
        }

        if (!in_array($admin->role, $roles) || $admin->id === $user->id) {
            throw new ForbiddenException('Bạn không có quyền xóa.');
        }

        $deleted = $this->repository->delete($id);

        if ($deleted && $admin->avatar) {
            Storage::delete(getFileContainFolder() . '/' . $admin->avatar);
        }
    }
}
