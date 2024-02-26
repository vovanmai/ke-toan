<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\User2\Comment\ListCommentService;
use App\Services\User\User2\Course\DetailService;
use App\Services\User\User2\Course\ListRelatedCourseService;
use App\Services\User\User2\Recruitment\ListRelatedRecruitmentService;
use App\Services\User\User2\Course\ListService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    public function index ()
    {
        try {
            $items = resolve(ListService::class)->handle();
            return view('user.user2.course.index', [
                'websiteTitle' => 'Thông tin khóa học',
                'items' => $items,
            ]);
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }

    public function show ($slug)
    {
        try {
            $item = resolve(DetailService::class)->handle($slug);
            $comments = resolve(ListCommentService::class)->handle([
                'target_id' => $item->id,
                'target_type' => 3,
            ]);
            $relatedCourses = resolve(ListRelatedCourseService::class)->handle($slug);
            return view('user.user2.course.detail', [
                'item' => $item,
                'websiteTitle' => $item->title,
                'relatedCourses' => $relatedCourses,
                'comments' => $comments,
            ]);
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('user.error.not_found');
        } catch (Exception $exception) {dd($exception->getMessage());
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }
}
