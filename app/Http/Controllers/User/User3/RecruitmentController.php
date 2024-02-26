<?php

namespace App\Http\Controllers\User\User3;

use App\Http\Controllers\Controller;
use App\Services\User\User1\Comment\ListCommentService;
use App\Services\User\User1\Recruitment\DetailService;
use App\Services\User\User1\Recruitment\ListRelatedRecruitmentService;
use App\Services\User\User1\Recruitment\ListService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class RecruitmentController extends Controller
{
    public function index ()
    {
        try {
            $recruitments = resolve(ListService::class)->handle();
            return view('user.user1.recruitment.index', [
                'websiteTitle' => 'Tuyển dụng',
                'recruitments' => $recruitments,
            ]);
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }

    public function show ($slug)
    {
        try {
            $recruitment = resolve(DetailService::class)->handle($slug);
            $comments = resolve(ListCommentService::class)->handle([
                'target_id' => $recruitment->id,
                'target_type' => 1,
            ]);
            $relatedRecruitments = resolve(ListRelatedRecruitmentService::class)->handle($slug);
            return view('user.user1.recruitment.detail', [
                'recruitment' => $recruitment,
                'websiteTitle' => $recruitment->title,
                'relatedRecruitments' => $relatedRecruitments,
                'comments' => $comments,
            ]);
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('user.error.not_found');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }
}
