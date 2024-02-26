<?php

namespace App\Http\Controllers\User\User1;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\User1\Comment\CreateCommentRequest;
use App\Services\User\User1\Comment\ListCommentService;
use App\Services\User\User1\Comment\StoreService;
use App\Services\User\User1\Recruitment\DetailService;
use App\Services\User\User1\Recruitment\ListRelatedRecruitmentService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function index (Request $request)
    {
        $data = $request->all();
        try {
            $comments = resolve(ListCommentService::class)->handle([
                'target_id' => $data['target_id'],
                'target_type' => $data['target_type'],
            ]);
            return response()->success('Thành công', $comments);
        } catch (Exception $exception) {
            Log::error($exception);
            return response()->error('Có lỗi trong khi truy cập đến máy chủ', $exception);
        }
    }

    public function show ($slug)
    {
        try {
            $recruitment = resolve(DetailService::class)->handle($slug);
            $relatedRecruitments = resolve(ListRelatedRecruitmentService::class)->handle($slug);
            return view('user.user1.recruitment.detail', [
                'recruitment' => $recruitment,
                'websiteTitle' => $recruitment->title,
                'relatedRecruitments' => $relatedRecruitments,
            ]);
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('user.error.not_found');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }

    public function store (CreateCommentRequest $request)
    {
        $data = $request->validated();
        try {
            $comment = resolve(StoreService::class)->handle($data);
            return response()->success('Tạo bình luận thành công!. Cảm ơn bạn đã gởi phản hồi đến chúng tôi.', $comment);
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }
}
