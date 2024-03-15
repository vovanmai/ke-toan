<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\CourseImage\ListService;
use App\Services\Admin\CourseImage\StoreService;
use Illuminate\Http\Request;
use Exception;
use Log;

class CourseImageController extends Controller
{
    public function index (Request $request)
    {
        $filters = $request->only([
            'title',
            'created_at_from',
            'created_at_to',
        ]);

        try {
            $items = resolve(ListService::class)->handle($filters);

            return view('admin.course-image.index', [
                'items' => $items,
            ]);
        } catch (Exception $exception) {
            return redirect()->route('admin.error.error');
        }
    }

    public function store (Request $request)
    {
        $data = $request->only([
            'images',
        ]);

        try {
            resolve(StoreService::class)->handle($data);
            session()->flash('success_message', 'Thêm hành công!');
            return response()->success('Thành công');
        } catch (Exception $exception) {
            return response()->error('Máy chủ bị lỗi', $exception);
        }
    }
}
