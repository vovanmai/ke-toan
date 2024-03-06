<?php

namespace App\Services\User\Auth;

use App\Data\Repositories\Eloquent\UserRepository;

class RegisterUserService
{
    /**
     * @var UserRepository
     */
    protected $repository;

    public function __construct(UserRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Register user
     *
     * @param array $data Data
     *
     * @return array
     */
    public function handle (array $data)
    {
        return $this->repository->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
