<?php

namespace App\Http\Controllers\User\User2;

use App\Http\Controllers\Controller;
use App\Services\User\User2\Comment\ListCommentService;
use App\Services\User\User2\Post\DetailService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index ($slug)
    {
        try {
            $item = resolve(\App\Services\User\User2\Category\DetailService::class)->handle($slug);

            $catIds = !$item->parent ? $item->children->pluck('id')->toArray() : [];
            $catIds[] = $item->id;

            $items = resolve(ListPostByCategoryService::class)->handle($catIds);
            return view('user.user2.post.index', [
                'item' => $item,
                'items' => $items,
                'websiteTitle' => $item->title,
            ]);
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('user.error.not_found');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }

    public function search (Request $request)
    {
        $data = $request->only([
            'key'
        ]);
        try {
            $items = resolve(SearchPostService::class)->handle($data);
            return view('user.user2.post.search', [
                'items' => $items,
                'websiteTitle' => $items->total() . " kết quả tìm kiếm...",
            ]);
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('user.error.not_found');
        } catch (Exception $exception) {dd($exception->getMessage());
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }

    public function show ($slug)
    {
        try {
            $post = resolve(DetailService::class)->handle($slug);
            $catIds = $post->category->parent
                ? $post->category->parent->children->pluck('id')->toArray()
                : $post->category->children->pluck('id')->toArray();
            $catIds[] = $post->category_id;
            $relatedItems = resolve(ListRelatedPostService::class)->handle([
                'slug' => $slug,
                'category_ids' => $catIds,
            ]);
            $comments = resolve(ListCommentService::class)->handle([
                'target_id' => $post->id,
                'target_type' => 2,
            ]);
            Log::error(456);
            return view('user.user2.post.detail', [
                'item' => $post,
                'websiteTitle' => $post->title,
                'comments' => $comments,
                'relatedItems' => $relatedItems,
            ]);
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('user.error.not_found');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }
}
