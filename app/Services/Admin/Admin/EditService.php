<?php

namespace App\Services\Admin\Admin;

use App\Data\Exceptions\ForbiddenException;
use App\Data\Repositories\Eloquent\AdminRepository;
use App\Models\Admin;
use App\Models\Image;
use App\Services\Admin\CommonService;
use App\Services\Common\Image\CreateOrUpdateImageService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditService
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
     * @param array $data Data
     *
     * @return array
     */
    public function handle (array $data, int $id)
    {
        $admin = $this->repository->find($id);

        $roles = array_keys(resolve(CommonService::class)->getRoles());

        if (!in_array($admin->role, $roles)) {
            throw new ForbiddenException();
        }

        $dataUpdate = [
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
        ];

        if (isset($data['avatar']) && !empty($data['avatar'])) {
            $dataUpdate['avatar'] = $data['avatar'];
        }

        if (isset($data['password'])) {
            $dataUpdate['password'] = bcrypt($data['password']);
        }

        $this->repository->update($dataUpdate, $id);
    }
}
