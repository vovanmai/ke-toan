<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\Post\DetailService;
use App\Services\User\Post\ListByCategoryService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index ($slug)
    {
        try {
            $data = resolve(ListByCategoryService::class)->handle($slug);
            return view('user.post.index', $data);
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('user.error.not_found');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }

    public function show (string $cat, string $slug)
    {
        try {
            $post = resolve(DetailService::class)->handle($cat, $slug);
            makeSEO([
                'title' => $post->title,
                'description' => $post->short_description,
                'image' => $post->image['url'],
            ]);
            return view('user.post.detail', [
                'item' => $post
            ]);
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('user.error.not_found');
        } catch (Exception $exception) {dd($exception);
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }
}
