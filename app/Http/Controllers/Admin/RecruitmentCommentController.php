<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recruitment;
use App\Services\Admin\Comment\ChangeStatusService;
use App\Services\Admin\Comment\ListService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Exception;
use Log;

class RecruitmentCommentController extends Controller
{
    public function index (Request $request)
    {
        $filters = $request->only([
            'name',
            'email',
            'active',
            'created_at_from',
            'created_at_to',
        ]);
        $filters['target_type'] = Recruitment::class;

        try {

            $items = resolve(ListService::class)->handle($filters);

            return view('admin.comment.index', [
                'items' => $items,
                'targetType' => Recruitment::class,
            ]);
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('admin.error.error');
        }
    }

    public function changeStatus (Request $request, $id)
    {
        try {
            $data = $request->only([
                'active'
            ]);
            $result = resolve(ChangeStatusService::class)->handle($id, $data);
            return response()->success('Xóa danh mục thành công thành công', $result);
        } catch (ModelNotFoundException $exception) {
            return response()->notFound();
        } catch (Exception $exception) {
            return response()->error('Máy chủ bị lỗi', $exception);
        }
    }
}
