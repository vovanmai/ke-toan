<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\RequestLog\ListService;
use Illuminate\Http\Request;
use Exception;

class RequestLogController extends Controller
{
    public function index (Request $request)
    {
        $filters = $request->only([
            'path',
            'ip',
            'created_at_from',
            'created_at_to',
        ]);

        try {

            $items = resolve(ListService::class)->handle($filters);

            return view('admin.request-log.index', [
                'items' => $items,
            ]);
        } catch (Exception $exception) {
            return redirect()->route('admin.error.error');
        }
    }
}
