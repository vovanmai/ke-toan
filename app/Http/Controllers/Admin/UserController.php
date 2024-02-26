<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\User\ListService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index (Request $request)
    {
        $filters = $request->only([
            'name',
            'email',
            'phone',
        ]);

        try {
            $items = resolve(ListService::class)->handle($filters);

            return view('admin.user.index', [
                'items' => $items,
            ]);
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('admin.error.error');
        }
    }
}
