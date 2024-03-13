<?php

namespace App\Http\Controllers\Admin;

use App\Data\Validators\Exceptions\ValidatorException;
use App\Http\Requests\Admin\CourseCategory\EditRequest;
use App\Http\Requests\Admin\CourseCategory\CreateRequest;
use App\Models\Category;
use App\Services\Admin\CourseCategory\ChangActiveService;
use App\Services\Admin\CourseCategory\CreateService;
use App\Services\Admin\CourseCategory\DeleteService;
use App\Services\Admin\CourseCategory\DetailService;
use App\Services\Admin\CourseCategory\GetAllService;
use App\Services\Admin\CourseCategory\ListService;
use App\Services\Admin\CourseCategory\UpdateService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Exception;
use Log;

class CourseCategoryController extends BaseController
{
    public function index (Request $request)
    {
        $filters = $request->only([
            'title',
        ]);

        $filters['type'] = Category::TYPE_COURSE;

        try {
            $categories = resolve(ListService::class)->handle($filters);

            return view('admin.course-category.all', [
                'categories' => $categories,
            ]);
        } catch (Exception $exception) {
            return redirect()->route('admin.error.error');
        }
    }

    public function all ()
    {
        try {
            $categories = resolve(GetAllService::class)->handle(Category::TYPE_COURSE);

            return view('admin.course-category.all', [
                'categories' => $categories,
            ]);
        } catch (Exception $exception) {
            return redirect()->route('admin.error.error');
        }
    }

    public function create ()
    {

        try {
            $categories = resolve(GetAllService::class)->handle(Category::TYPE_COURSE);

            return view('admin.course-category.create', [
                'categories' => $categories,
            ]);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function store (CreateRequest $request)
    {
        $data = $request->only([
            'title',
            'description',
            'category_id',
            'description',
        ]);

        $data['parent_id'] = $data['category_id'] ?? null;
        $data['type'] = Category::TYPE_COURSE;

        try {
            resolve(CreateService::class)->handle($data);

            session()->flash('success_message', 'Tạo danh mục thành công!');

            return redirect()->route('admin.course_category.list');
        } catch (ValidatorException $ex) {
            return redirect()->back()->withErrors($ex->getMessageBag());
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function edit (int $id)
    {
        try {
            $categories = resolve(GetAllService::class)->handle(Category::TYPE_COURSE);
            $editCategory = resolve(DetailService::class)->handle($id);

            return view('admin.course-category.edit', [
                'categories' => $categories,
                'editCategory' => $editCategory,
            ]);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function update (EditRequest $request, int $id)
    {
        $data = $request->only([
            'title',
            'description',
            'category_id',
            'description',
        ]);

        $data['parent_id'] = $data['category_id'] ?? null;
        $data['type'] = Category::TYPE_COURSE;

        try {
            resolve(UpdateService::class)->handle($id, $data);

            session()->flash('error_msg', trans('message.admin.create_success'));

            return redirect()->route('admin.course_category.list');
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function destroy ($id)
    {
        try {
            $result = resolve(DeleteService::class)->handle($id);
            return response()->success('Xóa danh mục thành công thành công', $result);
        } catch (ModelNotFoundException $exception) {
            return response()->notFound();
        } catch (Exception $exception) {
            return response()->error('Máy chủ bị lỗi', $exception);
        }
    }

    public function changeActive (Request $request, int $id)
    {
        $data = $request->only([
            'active'
        ]);
        try {
            resolve(ChangActiveService::class)->handle($id, $data);
            return response()->success('Thành công');
        } catch (ModelNotFoundException $exception) {
            return response()->notFound();
        } catch (Exception $exception) {
            return response()->error('Máy chủ bị lỗi', $exception);
        }
    }

    public function changeShowOnMenu (Request $request, int $id)
    {
        $data = $request->only([
            'show_on_menu',
        ]);
        try {
            resolve(ChangActiveService::class)->handle($id, $data);
            return response()->success('Thành công');
        } catch (ModelNotFoundException $exception) {
            return response()->notFound();
        } catch (Exception $exception) {
            return response()->error('Máy chủ bị lỗi', $exception);
        }
    }
}
