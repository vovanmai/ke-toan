<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\CreateRequest;
use App\Http\Requests\Admin\Course\UpdateRequest;
use App\Models\Category;
use App\Services\Admin\Course\ChangeActiveService;
use App\Services\Admin\Course\DeleteService;
use App\Services\Admin\Course\DetailService;
use App\Services\Admin\Course\StoreService;
use App\Services\Admin\Category\GetAllService;
use App\Services\Admin\Course\ListService;
use App\Services\Admin\Course\UpdateService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Exception;
use Log;

class CourseController extends Controller
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

            $categories = resolve(GetAllService::class)->handle(Category::TYPE_COURSE);
            $items = resolve(ListService::class)->handle($filters);

            return view('admin.course.index', [
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
            $categories = resolve(GetAllService::class)->handle(Category::TYPE_COURSE);

            if (!$categories->count()) {
                session()->flash('error_message', 'Vui lòng tạo danh mục trước khi tạo khóa học.');
                return redirect()->back();
            }

            return view('admin.course.create', [
                'categories' => $categories,
            ]);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function store (CreateRequest $request)
    {
        $data = $request->validated();
        try {
            $this->beginTransaction();
            resolve(StoreService::class)->handle($data);
            $this->commit();

            session()->flash('success_message', 'Tạo bài viết thành công!');

            return redirect()->route('admin.course.list');
        } catch (Exception $ex) {
            $this->rollback();
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function edit (int $id)
    {
        try {
            $categories = resolve(GetAllService::class)->handle(Category::TYPE_COURSE);
            $item = resolve(DetailService::class)->handle($id);
            return view('admin.course.edit', [
                'categories' => $categories,
                'item' => $item,
            ]);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function update (UpdateRequest $request, int $id)
    {
        $data = $request->validated();

        try {
            $this->beginTransaction();
            resolve(UpdateService::class)->handle($id, $data);
            $this->commit();

            session()->flash('success_message', 'Cập nhật bài viết thành công!');

            return redirect()->route('admin.course.list');
        } catch (Exception $ex) {
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
