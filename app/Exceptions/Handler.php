<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use TypeError;
use Illuminate\Support\Facades\Log;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Flare, Sentry, Bugsnag, etc.
     *
     * @param  \Throwable  $exception
     * @return void
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $e)
    {
        if ($e instanceof ValidationException) {
            if ($request->expectsJson()) {
                return response()->error(
                    'Dữ liệu nhập không hợp lê.',
                    Arr::first($e->errors()),
                    Response::HTTP_UNPROCESSABLE_ENTITY
                );
            }
        }

        if ($e instanceof NotFoundHttpException || $e instanceof MethodNotAllowedHttpException) {
            $route = $request->is('admin*') ? 'admin' : 'user';

            if ($request->is('admin*')) {
                return redirect()->route("admin.error.not_found");
            }

            $this->requestLog($request);

            return redirectredirect()->route("{$route}.error.not_found");
        }

        if ($e instanceof TypeError || $e instanceof \Exception) {
            $route = $request->is('admin*') ? 'admin' : 'user';
            return redirect()->route("{$route}.error.error");
        }

        return parent::render($request, $e);
    }

    public function requestLog($request)
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
    }
}
