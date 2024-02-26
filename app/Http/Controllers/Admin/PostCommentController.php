<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\Admin\Comment\ChangeStatusService;
use App\Services\Admin\Comment\ListService;
use App\Services\Admin\Comment\MaskReadCommentService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Exception;
use Log;

class PostCommentController extends Controller
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
        $filters['target_type'] = Post::class;

        try {

            $items = resolve(ListService::class)->handle($filters);

            return view('admin.comment.index', [
                'items' => $items,
                'targetType' => Post::class,
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

    public function markRead (Request $request)
    {
        try {
            $targetType = $request->get('target_type');
            $result = resolve(MaskReadCommentService::class)->handle($targetType);
            return response()->success('Thành công', $result);
        } catch (ModelNotFoundException $exception) {
            return response()->notFound();
        } catch (Exception $exception) {
            return response()->error('Máy chủ bị lỗi', $exception);
        }
    }
}