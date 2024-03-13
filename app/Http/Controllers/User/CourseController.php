<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\Course\DetailService;
use App\Services\User\Course\ListAllService;
use App\Services\User\Course\ListByCatService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    public function getAll ()
    {
        try {
            $data = resolve(ListAllService::class)->handle();
            return view('user.course.index', [
                'items' => $data
            ]);
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }

    public function index ($cat)
    {
        try {
            $data = resolve(ListByCatService::class)->handle($cat);
            return view('user.course.index', $data);
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }

    public function show (string $cat, string $slug)
    {
        try {
            $item = resolve(DetailService::class)->handle($cat, $slug);
            makeSEO([
                'title' => $item->title,
                'description' => $item->short_description,
                'image' => $item->image,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ]);
            return view('user.course.detail', [
                'item' => $item
            ]);
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('user.error.not_found');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }
}
