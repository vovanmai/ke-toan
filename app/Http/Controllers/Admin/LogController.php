<?php

namespace App\Http\Controllers\Admin;

use App\Data\Exceptions\ForbiddenException;
use App\Data\Repositories\Traits\TclEloquent;
use App\Http\Requests\Admin\Admin\CreateRequest;
use App\Http\Requests\Admin\Admin\EditRequest;
use App\Models\Admin;
use App\Services\Admin\Admin\ChangeActiveService;
use App\Services\Admin\Admin\CreateService;
use App\Services\Admin\Admin\DeleteService;
use App\Services\Admin\Admin\EditService;
use App\Services\Admin\Admin\ListService;
use App\Services\Admin\CommonService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Exception;

class LogController extends BaseController
{
    use TclEloquent;

    public function index (Request $request)
    {
        try {
            $directory = storage_path('logs/laravel.log');
            $content = File::get($directory);
            $size = File::size($directory);
            return view('admin.log.index', [
                'size' => $size,
                'content' => $content,
            ]);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return redirect()->route('admin.error.error');
        }
    }
}
