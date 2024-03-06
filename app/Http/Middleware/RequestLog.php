<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
        $now = now();
        $url = $request->getUri();
        $parseUrl = parse_url($url);

        $path = trim($parseUrl['path'], '/');
        $path = $path === '' ? '/' : $path;

        Log::info(sprintf(
            'Requested time: %s| Path: %s | IP: %s| Agent: %s',
            $now->format('Y-m-d H:i:s'),
            $path,
            $request->ip(),
            $request->userAgent()
        ));


        \App\Models\RequestLog::create([
            'requested_at' => $now,
            'path' => $path,
            'query' => $parseUrl['query'] ?? null,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return $next($request);
    }
}
