<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\Post\ListByCategoryService;
use Exception;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index ($slug)
    {
        try {
            $data = resolve(ListByCategoryService::class)->handle($slug);
            return view('user.post.index', $data);
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }
}
