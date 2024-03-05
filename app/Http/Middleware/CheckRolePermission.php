<?php

namespace App\Http\Middleware;

use App\Models\Admin;
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

        $pagesNotPermission = [
            Admin::ROLE_EDITOR => [
                'admin/admins*',
                'admin/website-setting*',
            ],
            Admin::ROLE_VIEWER => [
                'admin/admins*',
                'admin/website-setting*',
            ],
        ];

        $hasPermission = true;

        $pages = $pagesNotPermission[$user->role] ?? null;


        if ($pages) {
            foreach ($pages as $page) {
                if (request()->is($page)) {
                    $hasPermission = false;
                    break;
                }
            }
        }

        if (!$hasPermission) {
            if($request->ajax()) {
                return response()->error('Bạn không có quyền thực hiện tác vụ này.', [], Response::HTTP_FORBIDDEN);
            }
            return redirect()->route('admin.error.forbidden');
        }

        return $next($request);
    }
}
