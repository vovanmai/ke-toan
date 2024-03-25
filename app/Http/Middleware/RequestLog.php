<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RequestLog
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
        $query = $request->query();

        try {
            DB::table('request_logs')->insert([
                'method' => $request->method(),
                'path' => $request->path(),
                'query' => !empty($query) ? json_encode($request->query()) : null,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'created_at' => now(),
            ]);
        } catch (\Exception $exception) {
            Log::error('Request Log: =>>>>>>> Error: ' . $exception->getMessage());
        }

        return $next($request);
    }
}
