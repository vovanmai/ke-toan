<?php

namespace App\Services\User\Auth;

use App\Data\Repositories\Eloquent\UserRepository;
use Illuminate\Support\Facades\Auth;

class LoginService
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
     * @return boolean
     */
    public function handle (array $data)
    {
        $input = [
            'email' => $data['login_email'],
            'password' => $data['login_password'],
        ];
        $rememberMe = isset($data['remember_me']);
        if (Auth::attempt($input, $rememberMe)) {
            $user = Auth::user();
            $user->update([
                'login_at' => now()
            ]);
            return true;
        }

        return false;
    }
}
