<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\SupportAndConsultation\ListService;
use App\Services\Admin\SupportAndConsultation\MarkReadService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Exception;
use Log;

class SupportAndConsultationController extends Controller
{
    public function index (Request $request)
    {
        $filters = $request->only([
            'name',
            'phone',
            'is_read',
            'created_at_from',
            'created_at_to',
        ]);

        try {
            $items = resolve(ListService::class)->handle($filters);

            return view('admin.support-and-consultation.index', [
                'items' => $items,
            ]);
        } catch (Exception $exception) {
            return redirect()->route('admin.error.error');
        }
    }

    public function markRead ()
    {
        try {
            resolve(MarkReadService::class)->handle();
            return response()->success('Thành công');
        } catch (ModelNotFoundException $exception) {
            return response()->notFound();
        } catch (Exception $exception) {
            return response()->error('Máy chủ bị lỗi', $exception);
        }
    }
}
