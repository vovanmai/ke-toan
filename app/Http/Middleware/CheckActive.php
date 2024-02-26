<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckActive extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user->active) {
            Auth::logout();
            session()->flash('error_message', 'Tài khoản của bạn đã bị vô hiệu hóa.');
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
