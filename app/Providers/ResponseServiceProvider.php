<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Log;
use Exception;
use Illuminate\Support\Facades\Response;

class ResponseServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerSuccessResponse();
        $this->registerErrorResponse();
        $this->registerNotFoundResponse();
    }

    private function registerSuccessResponse()
    {
        Response::macro('success', function ($message = 'Thành công', $data = [], $statusCode = 200, $headers = []) {
            return response()->json([
                'status_code' => $statusCode,
                'message' => $message,
                'data' => $data,
            ], $statusCode, $headers);
        });
    }

    private function registerErrorResponse()
    {
        Response::macro('error', function ($message = 'Lỗi', $errors = [], $statusCode = 500, $headers = []) {
            if ($errors instanceof Exception) {
                Log::error($errors);
                $errors = [];
            }

            return response()->json([
                'status_code' => $statusCode,
                'message' => $message,
                'errors' => $errors,
            ], $statusCode, $headers);
        });
    }

    private function registerNotFoundResponse()
    {
        Response::macro('notFound', function ($message = 'Không tìm thấy', $errors = [], $statusCode = 404, $headers = []) {
            return response()->json([
                'status_code' => $statusCode,
                'message' => $message,
                'errors' => $errors,
            ], $statusCode, $headers);
        });
    }
}
