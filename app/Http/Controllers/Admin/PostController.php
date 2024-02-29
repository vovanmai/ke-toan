<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\CreatePostRequest;
use App\Http\Requests\Admin\Post\UpdatePostRequest;
use App\Models\Category;
use App\Services\Admin\Post\ChangeActiveService;
use App\Services\Admin\Post\DeleteService;
use App\Services\Admin\Post\DetailService;
use App\Services\Admin\Post\StoreService;
use App\Services\Admin\Category\GetAllService;
use App\Services\Admin\Post\ListService;
use App\Services\Admin\Post\UpdateService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Exception;
use Log;

class PostController extends Controller
{
    public function index (Request $request)
    {
        $filters = $request->only([
            'title',
            'price',
            'category_ids',
            'created_at_from',
            'created_at_to',
        ]);

        try {

            $categories = resolve(GetAllService::class)->handle();
            $items = resolve(ListService::class)->handle($filters);

            return view('admin.post.index', [
                'categories' => $categories,
                'items' => $items,
            ]);
        } catch (Exception $exception) {
            return redirect()->route('admin.error.error');
        }
    }

    public function create ()
    {
        try {
            $categories = resolve(GetAllService::class)->handle();

            if (!$categories->count()) {
                session()->flash('error_message', 'Vui lòng tạo danh mục trước khi tạo bài viết.');
                return redirect()->back();
            }

            return view('admin.post.create', [
                'categories' => $categories,
            ]);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function store (CreatePostRequest $request)
    {
        $data = $request->validated();
        try {
            $this->beginTransaction();
            resolve(StoreService::class)->handle($data);
            $this->commit();

            session()->flash('success_message', 'Tạo bài viết thành công!');

            return redirect()->route('admin.post.list');
        } catch (Exception $ex) {
            $this->rollback();
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function edit (int $id)
    {
        try {
            $categories = resolve(GetAllService::class)->handle();
            $item = resolve(DetailService::class)->handle($id);
            return view('admin.post.edit', [
                'categories' => $categories,
                'item' => $item,
            ]);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function update (UpdatePostRequest $request, int $id)
    {
        $data = $request->validated();

        try {
            $this->beginTransaction();
            resolve(UpdateService::class)->handle($id, $data);
            $this->commit();

            session()->flash('success_message', 'Cập nhật bài viết thành công!');

            return redirect()->route('admin.post.list');
        } catch (Exception $ex) {dd($ex->getMessage());
            $this->rollback();
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function destroy ($id)
    {
        try {
            $this->beginTransaction();
            $result = resolve(DeleteService::class)->handle($id);
            $this->commit();
            return response()->success('Xóa danh mục thành công thành công', $result);
        } catch (ModelNotFoundException $exception) {
            return response()->notFound();
        } catch (Exception $exception) {dd($exception->getMessage());
            $this->rollback();
            return response()->error('Máy chủ bị lỗi', $exception);
        }
    }

    public function changeActive (Request $request, int $id)
    {
        $data = $request->only([
            'active'
        ]);
        try {
            $this->beginTransaction();
            $result = resolve(ChangeActiveService::class)->handle($id, $data);
            $this->commit();
            return response()->success('Thành công', $result);
        } catch (ModelNotFoundException $exception) {
            return response()->notFound();
        } catch (Exception $exception) {
            $this->rollback();
            return response()->error('Máy chủ bị lỗi', $exception);
        }
    }
}
