<?php

namespace App\Services\User\Auth;

use App\Data\Repositories\Eloquent\UserRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class VerifyAccountService
{
    /**
     * @var UserRepository
     */
    protected $repository;

    public function __construct(UserRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Verify account
     *
     * @param array $data Data
     *
     * @return bool
     */
    public function handle (array $data)
    {
        $validator = Validator::make($data, [
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::exists('users', 'email')->whereNull('email_verified_at')
            ],
        ]);

        if ($validator->fails()) {
            return false;
        }

        $this->repository->updateWhere([
            'email' => $data['email'],
        ], [
            'email_verified_at' => now()
        ]);

        return true;
    }
}
