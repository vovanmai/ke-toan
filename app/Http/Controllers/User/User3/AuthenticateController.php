<?php

namespace App\Http\Controllers\User\User3;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\User1\Auth\LoginRequest;
use App\Http\Requests\User\User1\Auth\RegisterUserRequest;
use App\Services\User\User1\Auth\LoginService;
use App\Services\User\User1\Auth\RegisterUserService;
use App\Services\User\User1\Auth\VerifyAccountService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthenticateController extends Controller
{
    public function loginView ()
    {
        try {
            return view('user.user3.auth.login', [
                'websiteTitle' => 'Đăng nhập'
            ]);
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }

    public function register (RegisterUserRequest $request)
    {
        $data = $request->validated();

        try {
            resolve(RegisterUserService::class)->handle($data);
            session()->flash('success_message', 'Đăng ký thành công!. Vui lòng vào email để xác nhận tài khoản.');
            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }

    public function login (LoginRequest $request)
    {
        $data = $request->validated();

        try {
            $isLoginSuccess = resolve(LoginService::class)->handle($data);
            if ($isLoginSuccess) {
                session()->flash('success_message', 'Đăng nhập thành công.');
                return redirect()->route('user.index');
            } else {
                session()->flash('error_message', 'Thông tin tài khoản không đúng.');
                return redirect()->back()->withInput($data);
            }

        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }

    public function logout ()
    {
        try {
            auth()->logout();
            session()->flash('success_message', 'Đăng xuất thành công.');
            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }

    public function verify (Request $request)
    {
        $data = $request->only([
            'email'
        ]);

        try {
            $check = resolve(VerifyAccountService::class)->handle($data);

            if ($check) {
                session()->flash('success_message', 'Xác minh tài khoản thành công!. Vui lòng đăng nhập.');
            } else {
                session()->flash('error_message', 'Xác minh tài khoản thất bại!.');
            }
            return redirect()->route('user.login');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }
}
