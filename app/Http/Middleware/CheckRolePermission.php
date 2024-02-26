<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckRolePermission extends Middleware
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

        $permission = config('permission.admin');

        $methods = $permission[$user->role]['method'];

        if (!in_array($request->getMethod(), $methods)) {
            if($request->ajax()) {
                return response()->error('Bạn không có quyền thực hiện tác vụ này.', [], Response::HTTP_FORBIDDEN);
            }
            return redirect()->route('admin.error.forbidden');
        }

        return $next($request);
    }
}
