<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (!$user->active) {
            Auth::logout();
            session()->flash('error_message', 'Tài khoản của bạn đã bị vô hiệu hóa. Vui lòng liên hệ Super Admin để được hỗ trợ.');
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
