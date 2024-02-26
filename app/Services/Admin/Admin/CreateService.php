<?php

namespace App\Services\Admin\Admin;

use App\Data\Repositories\Eloquent\AdminRepository;
use App\Data\Repositories\Eloquent\ImageRepository;
use App\Data\Validators\AdminValidator;
use App\Mail\SendSuccessRegisteredAdminMail;
use App\Models\Admin;
use App\Models\Image;
use App\Models\Product;
use App\Services\Admin\CommonService;
use App\Services\Common\Image\CreateOrUpdateImageService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Prettus\Validator\Contracts\ValidatorInterface;

class CreateService
{
    /**
     * @var AdminRepository
     */
    protected $repository;

    public function __construct(
        AdminRepository $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * @param array $data Data
     *
     * @return array
     */
    public function handle (array $data)
    {
        $dataInsert = [
            'name' => $data['name'],
            'email' => $data['email'],
            'avatar' => $data['avatar'],
            'role' => $data['role'],
            'active' => true,
            'password' => bcrypt($data['password']),
        ];

        $created = $this->repository->create($dataInsert);

        $this->sendMail([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        return $created;
    }

    public function sendMail(array $data)
    {
        $data['login_url'] = URL::to('/admin/login');
        Mail::queue(new SendSuccessRegisteredAdminMail($data));
    }
}
