<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\User2\Document\DetailService;
use App\Services\User\User2\Document\DownloadService;
use App\Services\User\User2\Document\PaymentService;
use App\Services\User\User2\Post\ListPostByCategoryService;
use App\Services\User\User2\Post\SearchPostService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DocumentController extends Controller
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
            $document = resolve(DetailService::class)->handle($slug);

            return view('user.user2.document.detail', [
                'item' => $document,
            ]);
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('user.error.not_found');
        } catch (Exception $exception) {dd($exception->getMessage());
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }

    public function download ($id)
    {
        try {
            return resolve(DownloadService::class)->handle($id);
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('user.error.not_found');
        } catch (Exception $exception) {dd($exception->getMessage());
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }

    public function payment ($id)
    {
        try {
            return resolve(PaymentService::class)->handle($id);
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('user.error.not_found');
        } catch (Exception $exception) {dd($exception->getMessage());
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }
}
